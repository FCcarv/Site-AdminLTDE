<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 24/02/18
 * Time: 08:55
 */
class Users extends Model
{

    private $Table = "users";
    private $Result = null;
    private $Info_us;
    private $Permissoes;
    private $User;
    private $Data;








    public function getResult() {
        return $this->Result;
    }

    /*
     * Verifica se existe a sessao no sistema
     * */
    public function isLogado()
    {
        if(isset($_SESSION['userlogin']) && !empty($_SESSION['userlogin'])){
            return true;
        } else {
            return false;
        }
    }


    public function getInfo($id) {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getListUsers($id){

    $array = array();

    $sql = $this->db->prepare("
	SELECT
		users.id_user,
		users.nome_user,
		users.sobrenome_user,
		users.email_user,
		users.registro_user,
		users.foto_user,
		users.id_grup_permissao,
		grup_permissao.nome_grup_permissao
	FROM users
	LEFT JOIN grup_permissao ON grup_permissao.id_grup_permissao = users.id_grup_permissao");
	$sql->execute();

        if($sql->rowCount() > 0) {
           $array = $sql->fetchAll();
        }

        return $array;
   }

   /*
     * Retorna se exite e a quantidade de usuarios em um Grupo de Permissaão.
     * Esse metodo é usado no model Permissaso
     * */
    public function findUsersInGroup($id) {

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM " . $this->Table ." WHERE id_grup_permissao = :idgrup");
        $sql->bindValue(":idgrup", $id);
        $sql->execute();
        $row = $sql->fetch();

        if($row['c'] == '0') {
            return false;//se não tiver usuario
        } else {
            return true;//se tiver usuario
        }
    }

    /*Checa o email e retorna true ou false*/
    public function checkByEmail($email) {
        $sql = $this->db->prepare("SELECT * FROM " . $this->Table ." WHERE email_user = :email LIMIT 1");
        $sql->bindValue(":email",$email,PDO::PARAM_STR);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $this->Result = $sql->fetch();
                return true;

            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

/*TEm a responsabilidade de cadastrar usuarios , com permissao maxima de usuario ADMIN*/
    public function add($nome_us,$sobrenome_us,$email_us,$pass_us,$grup_us) {
        $mail_Id = $this->checkByEmail($email_us);
        if ($mail_Id == 0){

            $sql = $this->db->prepare("INSERT INTO users SET nome_user = :nome, sobrenome_user = :sobrenome, email_user =:email, pass_user = :pass, id_grup_permissao = :id_grup");
            $sql->bindValue(":nome", $nome_us);
            $sql->bindValue(":sobrenome", $sobrenome_us);
            $sql->bindValue(":email", $email_us);
            $sql->bindValue(":pass", password_hash($pass_us,PASSWORD_BCRYPT),PDO::PARAM_STR);
            $sql->bindValue(":id_grup", $grup_us);
            $sql->execute();

            return '1';
        }else{
            return '0';
        }

    }
    /*Faz uma busca a usuarios que não esta logoda , é usado no metodo insertUser do userscontrolle*/
    public function getUserInfo($id_us)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $id_us);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }
/*Tem a responsabilidade  de atualizar os usuarios do sistema , somente logado como ADMIN em nivel maximo de permissao*/
    public function edit($nome_us, $sobrenome_us, $pass_us, $grup_us,$id_us) {
        $sql = $this->db->prepare("UPDATE users SET nome_user = :nome_us, sobrenome_user = :sobrenome_us, id_grup_permissao = :id_grup 
          WHERE id_user = :id_us");

        $sql->bindValue(":nome_us", $nome_us);
        $sql->bindValue(":sobrenome_us", $sobrenome_us);
        $sql->bindValue(":id_grup", $grup_us);
        $sql->bindValue(":id_us", $id_us);
        $sql->execute();


        if(!empty($pass_us)) {
            $sql = $this->db->prepare("UPDATE users SET pass_user = :pass_us WHERE id_user = :id_us ");
            $sql->bindValue(":pass_us", password_hash($pass_us, PASSWORD_BCRYPT), PDO::PARAM_STR);
            $sql->bindValue(":id_us", $id_us);
            $sql->execute();

        }
    }
/*Exclui usuarios do sistema ,massomente logado como Admin em nivel maximo*/
    public function delete($id_us) {
        $sql = $this->db->prepare("DELETE FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $id_us);
        $sql->execute();
    }


/*Tem  a respomsabolidade de logar e direcionar o usuario a entrar no sistema*/
    public function login($dados_form)//senha $2y$10$6To/SbFMQCZXt.FdNwc.puUDf1nW/iY14iRtDKvv3X.0eszl6zegu
    {
        if ($this->checkByEmail($dados_form['email_us'])) {
            $passwordBD = $this->getResult()['pass_user'];
            if (password_verify($dados_form['pass_us'], $passwordBD)) {
                $_SESSION['userlogin'] = $this->getResult();
                return true;
            }
        }
    }

    /*Recupera o usuario logado e e sua sessão atraves do seu ID
     * */
    public function setLogUser()
    {
        if(isset($_SESSION['userlogin']) && !empty($_SESSION['userlogin'])){
            $id = $_SESSION['userlogin']['id_user'];


            $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
                $this->Permissoes = new Permissao;
                $this->Permissoes->setGroup($this->userInfo['id_grup_permissao']);
            }
        }
    }

    /*TEm a responsabilidade de cadastrar usuarios ,sem qualquer tipo de permissao no sistemae e filiação de grupos de permissao*/
    public function LoginCreate($dados_form)
    {
        $sql = $this->db->prepare("INSERT INTO users SET nome_user = :nome_us, sobrenome_user = :sobrenome_us, email_user= :email_us, pass_user =:pass_us, id_grup_permissao = :id_grup");


        $dados_form['grup_us'] = 0;

        $sql->bindValue(":nome_us",               $dados_form['nome_us'],PDO::PARAM_STR);
        $sql->bindValue(":sobrenome_us",          $dados_form['sobrenome_us'],PDO::PARAM_STR);
        $sql->bindValue(":email_us",              $dados_form['email_us'],PDO::PARAM_STR);
        $sql->bindValue(":pass_us",password_hash( $dados_form['pass_us'],PASSWORD_BCRYPT),PDO::PARAM_STR);
        $sql->bindValue(":id_grup",               $dados_form['grup_us'],PDO::PARAM_STR);

        try {
            $sql->execute();
            if ($sql->rowCount() == 1) {
                $this->Result = $this->db->lastInsertId();
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function selectById($id) {
        $sql = $this->db->prepare("SELECT * FROM " . $this->Table ." WHERE id = :id LIMIT 1");
        $sql->bindValue(":id",$id,PDO::PARAM_INT);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $this->Result = $sql->fetch();
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


   /*Checa o email e retorna true ou false*/
   /* public function setToken(array $Data)
    {

        $sql = $this->db->prepare("SELECT * FROM users WHERE email_user = :email");
        $sql->bindValue(":email",$Data['email_us']);
        $sql->execute();

        //print_r($sql->fetch());exit;

        if($sql->rowCount() > 0) {
           $sql = $sql->fetch();
            $idus = $sql['id_user'];


            $token = md5(time() . rand(0, 99999) . rand(0, 99999));


            $sql = $this->db->prepare("INSERT INTO tokens_users (hash, expirado_em, id_user) VALUES (:hash, :expirado_em, :iduser)");
            $sql->bindValue(":hash", $token);
            $sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+1 months')));
            $sql->bindValue(":iduser", $idus);
            $sql->execute();
            return '1';

        }else{

            return '0';
        }
    }*/

   public function recuperar()
   {

   }

    public function insertRec() {
        /*print_r($iduser);
          exit;*/
    }


    public function getId() {
        if(isset($this->userInfo['id_user'])) {
            return $this->userInfo['id_user'];
        } else {
            return '';
        }
    }

    public function getEmail() {
        if(isset($this->userInfo['email_user'])) {
            return $this->userInfo['email_user'];
        } else {
            return '';
        }
    }
    /* Esse metodo faz logout no sistema*/
    public function logout()
    {
        unset($_SESSION['userlogin']);
        session_destroy();
        header("Location: " . BASEADMIN . '/login');
    }

    /* Metodo esta sendo replicado do model Permissao, permitindo assim usar dentro
     do model User a validação de permissao */
    public function existPermissao($name) {
        return $this->Permissoes->existPermissao($name);
    }

    public function setToken(array $Data)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE email_user = :email");
        $sql->bindValue(":email",$Data['email_us']);
        $sql->execute();

        //print_r($sql->fetch());exit;

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $idus = $sql['id_user'];


            $token = md5(time() . rand(0, 99999) . rand(0, 99999));

            $this->User['hash'] = $token;
            $this->User['expirado_em'] = date('Y-m-d H:i', strtotime('+1 months'));
            $this->User['id_user'] = $idus;


            $sql = $this->db->prepare("INSERT INTO tokens_users (hash, expirado_em, id_user) VALUES (:hash, :expirado_em, :iduser)");
            $sql->bindValue(":hash",        $this->User['hash']);
            $sql->bindValue(":expirado_em", $this->User['expirado_em']);
            $sql->bindValue(":iduser",      $this->User['id_user']);
            $sql->execute();


            return '1';

        }else{

            return '0';
        }
    }

    /*Metodo responsavel pelas configurações do email*/
//Recupera e separa os atributos pelo Array Data.
    public function setMailRec() {

        $this->Assunto       = $this->Data['Assunto'];
        $this->RecuperaEmail = $this->Data['RecuperaEmail'];
        $this->DestinoNome   = $this->Data['DestinoNome'];
        $this->DestinoEmail  = $this->Data['DestinoEmail'];

        $this->Data = null;
        $this->setMsgRec();
    }

    //Formatar ou Personalizar a Mensagem!
    public function setMsgRec() {
        $token  = $this->User['hash'];
        $Id     = $this->User['id_user'];
        $link = BASEADMIN."login/recupera/id={$Id}&token={$token}";
        $this->Mensagem = "Clique no link para redefinir sua senha:<br/>".$link;

    }

    //Configura o PHPMailer e valida o e-mail!
    public function Config() {
        //SMTP AUTH
        $this->Mail->IsSMTP();
        $this->Mail->SMTPAuth = true;
        $this->Mail->IsHTML();

        //REMETENTE E RETORNO
        $this->Mail->From = MAILUSER;
        //$this->Mail->FromName = $this->id_Data;
        $this->Mail->AddReplyTo($this->RecuperaEmail);//, $this->RemetenteNome);//campos do formulario

        //ASSUNTO, MENSAGEM E DESTINO
        $this->Mail->Subject = $this->Assunto;
        $this->Mail->Body .= "Seguem os dados para redefinir sua senha:<br /><br />
                               
                             <strong>Obs:</strong> Você não precisa responder este e-mail.
                             <strong>$this->Mensagem</strong>";
        $this->Mail->AddAddress($this->DestinoEmail, $this->DestinoNome);//aqui é usado um outro email do dominio pra enviar respostas e com nome personalizado se preferir
    }

    //Envia o e-mail!
    public function sendMailRec() {
        if ($this->Mail->Send() > 0){
            return '1';

        }else{

            return '0';
        }

    }

}
