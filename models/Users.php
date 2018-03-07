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
    private $userInfo;


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

    /*faz funcionar o login no sistema*/
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
            }
        }
    }

    public function getEmail() {
        if(isset($this->userInfo['email'])) {
            return $this->userInfo['email'];
        } else {
            return '';
        }
    }

    public function logout()
    {
        unset($_SESSION['userlogin']);
        session_destroy();
        header("Location: " . BASEADMIN . '/login');
    }
}