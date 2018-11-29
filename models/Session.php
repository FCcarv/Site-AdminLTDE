<?php
/**
 * Session.class [ HELPER ]
 * Responsável pelas estatísticas, sessões e atualizações de tráfego do sistema
 * User: franc
 * Date: 29/11/18
 * Time: 17:51
 */

class Session extends Model
{

    private $Date;
    private $Cache;
    private $Traffic;
    private $Browser;

    function __construct($Cache = null) {
        parent::__construct();

        $this->CheckSession($Cache);
    }

    //Verifica e executa todos os métodos da classe!
    //: siteviews
    public function CheckSession($Cache = null) {
        $this->Date = date('Y-m-d');
        $this->Cache = ((int) $Cache ? $Cache : 20);

        if (empty($_SESSION['useronline'])):
            $this->setTraffic();
            $this->setSession();
            $this->CheckBrowser();
            $this->setUsuario();
            $this->BrowserUpdate();

        else:

            $this->TrafficUpdate();
            $this->sessionUpdate();
            $this->CheckBrowser();
            $this->UsuarioUpdate();
        endif;
        $this->Date = null;
    }


/*
 * ***************************************
 * ********   SESSÃO DO USUÁRIO   ********
 * ***************************************
 */
    //Inicia a sessão do usuário
    private function setSession() {
        $_SESSION['useronline'] = [
                                    "session_online"    => session_id(),
                                    "startview_online"  => date('Y-m-d H:i:s'),
                                    "endview_online"    => date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes")),
                                    "ip_online"         => filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP),
                                    "url_online"        => filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT),
                                    "agent_online"      => filter_input(INPUT_SERVER, "HTTP_USER_AGENT", FILTER_DEFAULT)
                                ];
    }

    //Atualiza sessão do usuário!
    private function sessionUpdate() {
        $_SESSION['useronline']['endview_online'] = date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes"));
        $_SESSION['useronline']['url_online'] = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
    }


    public function insertViews($ArrSiteViews){
        $views = $this->db->prepare("INSERT INTO siteviews (users_siteviews, views_siteviews, pages_siteviews, date_siteviews) 
                                                   VALUES (:usersViews, :viewViews, :pagesViews, :dateViews)");


        $views->bindValue(":usersViews",     $ArrSiteViews['users_siteviews'], PDO::PARAM_STR);
        $views->bindValue(":viewViews",      $ArrSiteViews['views_siteviews'], PDO::PARAM_STR);
        $views->bindValue(":pagesViews",     $ArrSiteViews['pages_siteviews'], PDO::PARAM_STR);
        $views->bindValue(":dateViews",      $ArrSiteViews['date_siteviews'], PDO::PARAM_STR);
        try {
            $views->execute();
            if ($views->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function updateViews($ArrSiteViews)
    {
        $views = $this->db->prepare("UPDATE siteviews SET users_siteviews = :usersViews, 
                                                            views_siteviews = :viewViews, 
                                                            pages_siteviews = :pagesViews  WHERE  date_siteviews = :date");


        $views->bindValue(":usersViews",     $ArrSiteViews['users_siteviews'], PDO::PARAM_STR);
        $views->bindValue(":viewViews",      $ArrSiteViews['views_siteviews'], PDO::PARAM_STR);
        $views->bindValue(":pagesViews",     $ArrSiteViews['pages_siteviews'], PDO::PARAM_INT);
        $views->bindValue(":date",           $this->Date);
        try {
            $views->execute();
            if ($views->rowCount() > 0){
                return true;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function updatePages($ArrSitePages)
    {
        $views = $this->db->prepare("UPDATE siteviews SET pages_siteviews = :pagesViews  WHERE  date_siteviews = :date");

        $views->bindValue(":pagesViews",     $ArrSitePages['pages_siteviews'], PDO::PARAM_INT);
        $views->bindValue(":date",           $this->Date);
        try {
            $views->execute();
            if ($views->rowCount() > 0){
                return true;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /*
     * ***************************************
     * *** USUÁRIOS, VISITAS, ATUALIZAÇÕES ***
     * ***************************************
     */
    //Verifica e insere o tráfego na tabela
    private function setTraffic()
    {
        $this->getTraffic();
        if (!$this->Traffic):
            $ArrSiteViews = [
                'users_siteviews' => 1,
                'views_siteviews' => 1,
                'pages_siteviews' => 1,
                'date_siteviews' => $this->Date
            ];
            $this->insertViews($ArrSiteViews);

        else:
            $upViewsTraffic = $this->getTraffic();
            foreach ($upViewsTraffic as $views);
            if (!$this->getCookie()):
               $ArrSiteViews = [ 'users_siteviews' => $views['users_siteviews'] + 1,
                                 'views_siteviews' => $views['views_siteviews'] + 1,
                                 'pages_siteviews' => $views['pages_siteviews'] + 1
                                ];
            else:
               $ArrSiteViews = [ 'users_siteviews' => $views['users_siteviews'],
                                 'views_siteviews' => $views['views_siteviews'] + 1,
                                 'pages_siteviews' => $views['pages_siteviews'] + 1
                                ];
            endif;

            $this->updateViews($ArrSiteViews);
        endif;
    }

    //Verifica e atualiza os pageviews
    private function TrafficUpdate()
    {
        $this->getTraffic();
        $ArrSitePages = ['pages_siteviews' => $this->Traffic[0]['pages_siteviews'] + 1];
        $this->updatePages($ArrSitePages);

        $this->Traffic = null;
    }


    //ws_siteviews
    private function getCookie()
    {
        $Cookie = filter_input(INPUT_COOKIE, 'useronline', FILTER_DEFAULT);
        setcookie("useronline", base64_encode("instZFriggi"), time() + 86400);
        if (!$Cookie):
            return false;
        else:
            return true;
        endif;
    }

    private function getTraffic()
    {
        $sql = $this->db->prepare("SELECT * FROM siteviews WHERE date_siteviews = :date");
        $sql->bindValue(":date", $this->Date);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0 ) {
                $this->Traffic = $sql->fetchAll(PDO::FETCH_ASSOC);
                return  $this->Traffic;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * ***************************************
     * *******  NAVEGADORES DE ACESSO   ******
     * ***************************************
     */
    //Identifica navegador do usuário!
    private function CheckBrowser() {
        $this->Browser = $_SESSION['useronline']['agent_online'];
        if (strpos($this->Browser, 'Chrome')):
           $this->Browser = 'Chrome';
            elseif (strpos($this->Browser, 'Firefox')):
               $this->Browser = 'Firefox';
           elseif (strpos($this->Browser, 'MSIE') || strpos($this->Browser, 'Trident/')):
               $this->Browser = 'IE';
           else:
               $this->Browser = 'Outros';
        endif;
    }


    private function readBrowser()
    {
        $sql = $this->db->prepare("SELECT * FROM siteviews_agent WHERE name_agent = :agent");
        $sql->bindValue(":agent", $this->Browser);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0 ) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function insertBrowser($ArrBrowser)
    {
        $views = $this->db->prepare("INSERT INTO siteviews_agent (name_agent, views_agent) VALUES (:name_agent, :views_agent)");

        $views->bindValue(":name_agent",  $ArrBrowser['name_agent'],  PDO::PARAM_STR);
        $views->bindValue(":views_agent", $ArrBrowser['views_agent'], PDO::PARAM_STR);
        try {
            $views->execute();
            if ($views->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function updateBrowser($ArrBr)
    {
        $views = $this->db->prepare("UPDATE siteviews_agent SET views_agent = :viewsAg WHERE name_agent = :nameBr");

        $views->bindValue(":viewsAg", $ArrBr['views_agent'], PDO::PARAM_STR);
        $views->bindValue(":nameBr",  $ArrBr['name_agent'], PDO::PARAM_STR);
        try {
            $views->execute();
            if ($views->rowCount() > 0){
                return true;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //Atualiza tabela com dados de navegadores!
    public function BrowserUpdate(){
        $readAgent = $this->readBrowser();
         if ($readAgent == false):
            $ArrAgent = ['name_agent' => $this->Browser, 'views_agent' => 1];
            $this->insertBrowser($ArrAgent);
        else:

            $ArrAgent = ['name_agent' => $this->Browser, 'views_agent' => $readAgent[0]['views_agent'] + 1];
            $this->updateBrowser($ArrAgent);
        endif;
    }

    /*
 * ***************************************
 * *********   USUÁRIOS ONLINE   *********
 * ***************************************
 */


    private function readUserOn()
    {
        $sql = $this->db->prepare("SELECT * FROM siteviews_online WHERE session_online = :onses");
        $sql->bindValue(":onses",$_SESSION['useronline']['session_online']);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0 ) {
                return $sql->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function insertUserOn($ArrUserOn){
        $views = $this->db->prepare("INSERT INTO siteviews_online (session_online, startview_online, endview_online, ip_online, url_online, agent_online, name_agent) 
                                                   VALUES (:on_session, :on_startview, :on_endview, :on_ip, :on_url, :on_agent, :name_agent)");

        $views->bindValue(":on_session",        session_id(),   PDO::PARAM_STR);
        $views->bindValue(":on_startview",      $ArrUserOn['startview_online'], PDO::PARAM_STR);
        $views->bindValue(":on_endview",        $ArrUserOn['endview_online'],   PDO::PARAM_STR);
        $views->bindValue(":on_ip",             $ArrUserOn['ip_online'],        PDO::PARAM_STR);
        $views->bindValue(":on_url",            $ArrUserOn['url_online'],       PDO::PARAM_STR);
        $views->bindValue(":on_agent",          $ArrUserOn['agent_online'],     PDO::PARAM_STR);
        $views->bindValue(":name_agent",        $ArrUserOn['name_agent'],       PDO::PARAM_STR);
        try {
            $views->execute();
            if ($views->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function updateUserOn($ArrUserOn)
    {
        $views = $this->db->prepare("UPDATE siteviews_online SET  endview_online = :on_endview, url_online = :on_url WHERE session_online = :ses");

        $views->bindValue(":on_endview",        $ArrUserOn['endview_online'],   PDO::PARAM_STR);
        $views->bindValue(":on_url",            $ArrUserOn['url_online'],       PDO::PARAM_STR);
        $views->bindValue(":ses",               $_SESSION['useronline']['session_online']);

        try {
            $views->execute();
            if ($views->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //Cadastra usuário online na tabela!
    private function setUsuario() {
        $sesOnline = $_SESSION['useronline'];
        $sesOnline['name_agent'] = $this->Browser;

        $this->insertUserOn($sesOnline);
     }

    //Atualiza navegação do usuário online!
    private function UsuarioUpdate() {

        $ArrOnlone = [
            'endview_online'   => $_SESSION['useronline']['endview_online'],
            'url_online'       => $_SESSION['useronline']['url_online'],
            'session_online'   => $_SESSION['useronline']['session_online']
        ];

            //var_dump($_SESSION['useronline']['session_online']);die;
        $userUpdate = $this->updateUserOn($ArrOnlone);
            if ($userUpdate == false || $_SESSION['useronline'] == null):
               $redSes = $this->readUserOn();
                if ($redSes == false){
                    $this->setUsuario();
                }
           endif;
        //$userUpdate = $this->updateUserOn($ArrOnlone);
        //var_dump($userUpdate);die;

       //endforeach;

    }
}
