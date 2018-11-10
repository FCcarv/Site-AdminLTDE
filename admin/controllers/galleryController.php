<?php
/**
 * Controller de Models e Views  da galeria de Videos.
 * Responsável apemas pela gestão das galerias
 * dos videos do you tube e do vimeo
 */

class galleryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $u = new Users();
        if ($u->isLogado() == false) {
            header("Location: " . BASEADMIN . "login");
            exit;
        }
    }

    /*Execução da pagínação de resultados e videos listandos em ordem alfabetica*/
    public function index()
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('gallery_view')) {

            $limit = 6; //qtidade de itens por pagina
          $totalPgs = $gal->totalVideos();//total de paginas

           $dados['pgs']= ceil($totalPgs/$limit);//paginas

              $dados['pagAtual'] = 1;
            if(!empty($_GET['p'])) {
               $dados['pagAtual'] = intval($_GET['p']);
           }
           $offset = ($dados['pagAtual'] * $limit) - $limit;

            $dados['getVideos']= $gal->getVideo($offset, $limit);

            $this->loadTemplate('galeria/VideoGal', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*Puxa a view de cadastro dos videos */
    public function addGalVid()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('gallery_view')) {

            $this->loadTemplate('galeria/caddVideo', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    //Verifica se é video do youtube ou vimeo e salva no banco.
    public function addVid()
    {
        $dados = [];
        $u = new Users();
        $galRep = new GallRepository();
        $u->setLogUser();

        $dados_Form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        $URL = $dados_Form['gal_url'];

        if (isset($URL) && !empty($URL)){
           if((substr_count($URL, 'youtube') == 1)  && ($galRep->setVideotube($URL) == true)){
               $dados['retorno'] = Alert::AjaxSuccess("O video do <b>Youtube</b> foi cadastrado com sucesso!!");
                $dados['redirect'] = Alert::AjaxRedirect("gallery/");
           }else{
               $galRep->setVideoVimeo($URL);
               $dados['retorno'] = Alert::AjaxSuccess("O video do <b>Vimeo</b> foi cadastrado com sucesso!!");
               $dados['redirect'] = Alert::AjaxRedirect("gallery/");
           }
        } else {
            $dados['retorno'] = Alert::AjaxDanger("<b>Erro: ao cadastrar o video no sistema!!</b>");
            $dados['redirect'] = Alert::AjaxRedirect("gallery/");
        }
        $galRep->return_ajax_error($dados);
    }

/*Puxa view do  player do video buscando pelo id */
    public function editGalVid($id_video)
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('gallery_view')) {

            $dados['setVideo'] = $gal->getIdVideo($id_video);
            $this->loadTemplate('galeria/galVideo', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*Verifica o statuis dos videos e retorna publicado (1) ou  tascunho (0) */
    public function checkGalVid($id_video)
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('gallery_view')) {

            $check = $gal->getStatusVideo($id_video);
          if(!empty($check)){
              If(in_array("0", $check)){
                  $check ['status_video'] = 1;
              }else{
                  $check ['status_video'] = 0;
              }
              $gal->upStatusVid($check ['status_video'], $id_video);
          }
            header("Location: " . BASEADMIN ."gallery/");
            $this->loadTemplate('galeria/galVideo', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*Deleta o video via ajax*/
    public function delGalVid()
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('gallery_view')) {

            if(isset($_POST['id'])){
                $idVid =$_POST['id'];

                $DelVideo = $gal->delVideo($idVid);
                if ($DelVideo == true){
                   $dados['redirect'] = Alert::AjaxRedirect("gallery/");
                } else {
                    $dados['retorno'] = Alert::AjaxDanger("<b>Erro: ao Excluir video no sistema!!</b>");
                    $dados['redirect'] = Alert::AjaxRedirect("gallery/");
                }
            }
        } else {
            header("Location: " . BASEADMIN);
        }
    }
}