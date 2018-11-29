<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 24/02/18
 * Time: 08:55
 * CLASSE RESPONSÁVEL POR  MANIPULAR E TRATAR  TODAS INFORMAÇÕES DOS USUÁRIOS DO SISTEMA.
 */
class Users extends Model
{
    private $Table = "users";
    private $Result = null;
    public $userInfo;
    private $Permissoes;
    private $User;
    private $Data;
    private $Pass;

    public function getResult() {
        return $this->Result;
    }

    /*
     * VERIFICA SE EXISTE  SESSAO CRIADA NO SISTEMA
     */
    public function isLogado()
    {
        if(isset($_SESSION['userlogin']) && !empty($_SESSION['userlogin'])){
            return true;
        } else {
            return false;
        }
    }


/*busca informaçoes do usuario e manda parsa a template view
*É usado na atualizaçõa dss informações do usuario ao editar o seu proprio  perfil
*/
    public function selectID($id_user)
    {
           $sql = $this->db->prepare("SELECT * FROM users WHERE id_user= :id LIMIT 1");
           $sql->bindValue(":id", $id_user);
           try {
               $sql->execute();
               if ($sql->rowCount() > 0) {
                   $sql= $sql->fetch(PDO::FETCH_ASSOC);
                   return $sql;
                  }
           } catch (PDOException $e) {
               die($e->getMessage());
           }
    }

/*BUSCAR INFORMAÇÕES DO USUARIO LOGADO NO SISTEMA NO BANCO DE DADOS E RETORNA SEU ID.*/
    public function getInfo($id) {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        //sprint_r($array);exit;
      return $array;
    }

/*LISTA  OS USUÁRIOS DO SISTEMA E OS SEUS GRUPOS DE PERMISSAO ASSOSSIADOS COM O MESMO.*/
    public function getListUsers(){

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
    * RETORNA SE EXITE E A QUANTIDADE DE USUARIOS EM UM GRUPO DE PERMISSAÃO.
     * ESSE METODO É USADO NO MODEL PERMISSAO
     */
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

    /*CHECA O EMAIL E RETORNA TRUE OU FALSE*/
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

    /*TEM A RESPONSABILIDADE DE CADASTRAR USUARIOS , COM PERMISSAO MAXIMA DE USUARIO ADMIN*/
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
    /*FAZ UMA BUSCA A USUARIOS QUE NÃO ESTA LOGODA , É USADO NO METODO INSERTUSER DO USERSCONTROLLE*/
    public function getUserInfo($id_us)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $id_us);
        $sql->execute();
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

/*Atualiza somentes os dados do usuatio , mas tem que estar logasdo como admim*/
    public function update(array $dados_form, $id_us )
    {
        $sql = $this->db->prepare("UPDATE users SET nome_user = :nome_us, sobrenome_user = :sobrenome_us, id_grup_permissao = :id_grup 
          WHERE id_user = :id_us");

        $sql->bindValue(":nome_us",      $dados_form['nome_us']);
        $sql->bindValue(":sobrenome_us", $dados_form['sobrenome_us']);
        $sql->bindValue(":id_grup",      $dados_form['grup_us']);
        $sql->bindValue(":id_us",        $id_us);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;}

        if(!isset($dados_form['pass_us']) || empty($dados_form['pass_us'])){
            unset($dados_form['pass_us']);

        }else{

            $sql = $this->db->prepare("UPDATE users SET pass_user = :pass_us WHERE id_user = :id_us");
            $sql->bindValue(":pass_us",password_hash($dados_form['pass_us'],PASSWORD_BCRYPT),PDO::PARAM_STR);
            $sql->bindValue(":id_us", $id_us);
            try {
                $sql->execute();
                if ($sql->rowCount() > 0){

                    return true;
                }else{
                    return false;
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
    // print_r( $sql);exit;
        }
    }

    /*TEM A RESPONSABILIDADE  DE ATUALIZAR OS USUARIOS DO SISTEMA , SOMENTE LOGADO COMO ADMIN EM NIVEL MAXIMO DE PERMISSAO
    */
    public function editUser($nome_us, $sobrenome_us, $grup_us, $id_us)
    {
        $sql = $this->db->prepare("UPDATE users SET nome_user = :nome_us, sobrenome_user = :sobrenome_us, id_grup_permissao = :id_grup 
          WHERE id_user = :id_us");

        $sql->bindValue(":nome_us", $nome_us);
        $sql->bindValue(":sobrenome_us", $sobrenome_us);
        $sql->bindValue(":id_grup", $grup_us);
        $sql->bindValue(":id_us", $id_us);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {

                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editPassUser($pass_us,$id_us)
    {
        $sql = $this->db->prepare("UPDATE users SET pass_user = :pass_us WHERE id_user = :id_us");
        $sql->bindValue(":pass_us", password_hash($pass_us, PASSWORD_BCRYPT), PDO::PARAM_STR);
        $sql->bindValue(":id_us", $id_us);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function upUserFto($ft, $id)
    {
        $sql = $this->db->prepare("UPDATE users SET foto_user = :ftos_us WHERE id_user =:id_us");
        $sql->bindValue(":ftos_us", $ft);
        $sql->bindValue(":id_us", $id);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*EXCLUI USUARIOS DO SISTEMA ,MAS SOMENTE LOGADO COMO ADMIN EM NIVEL MAXIMO
    *A exclusão do usuario só será feita , se não for o mesmo usuárto e se não for o único admin do sistema.
     */
    public function delete($id_us)
    {
      if(($id_us !== $_SESSION['userlogin']['id_user']) && ($id_us !== 1)){
        $sql = $this->db->prepare("DELETE FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $id_us);
         try {
             $sql->execute();
             if ($sql->rowCount() == 1) {
                 return true;
             }
         } catch (PDOException $e) {
             die($e->getMessage());
         }
      }else{
          return false;
      }
    }

    /*TEM  A RESPOMSABILIDADE DE LOGAR E DIRECIONAR O USUARIO A ENTRAR NO SISTEMA
    */
    public function login($dados_form)
    {
        if ($this->checkByEmail($dados_form['email_us'])) {
            $passwordBD = $this->getResult()['pass_user'];
            if (password_verify($dados_form['pass_us'], $passwordBD)) {
                if (isset($dados_form['remenber'])) {
                    $cookiesalva = base64_encode($dados_form['email_us']) . '&' . base64_encode($dados_form['pass_us']);
                    setcookie('userCookie', $cookiesalva, time() + 60 * 60 * 24 * 30, BASEADMIN);
                    $_SESSION['userlogin'] = $this->getResult();
                    return true;
                } else {
                    setcookie('userCookie', '', time() + 3600, BASEADMIN);
                    $_SESSION['userlogin'] = $this->getResult();
                    return true;
                }
            }
        }
    }

    /*
     * RECUPERA O USUARIO LOGADO E E SUA SESSÃO ATRAVES DO SEU ID
     */
    public function setLogUser()
    {
        if(isset($_SESSION['userlogin']) && !empty($_SESSION['userlogin'])) {
           $id = $_SESSION['userlogin']['id_user'];

            $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
                $this->Permissoes = new Permissao;
                $this->Permissoes->setGroup($this->userInfo['id_grup_permissao']);
            }
        }else{
            $this->logout();
        }
    }

    /*TEM A RESPONSABILIDADE DE CADASTRAR USUARIOS ,
    *SEM QUALQUER TIPO DE PERMISSAO NO SISTEMA E FILIAÇÃO DE GRUPOS DE PERMISSAO
    */
    public function LoginCreate($dados_form)
    {
        $sql = $this->db->prepare("INSERT INTO users SET nome_user = :nome_us, sobrenome_user = :sobrenome_us, email_user= :email_us, pass_user =:pass_us, id_grup_permissao = :id_grup");
        $dados_form['grup_us'] = 0;

        $sql->bindValue(":nome_us",               $dados_form['nome_us'] );
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

    /*PEGA O USUARIO LOGADO PELO ID['id_grup_permissao']
     * */
    public function getId() {
        if(isset($this->userInfo['id_user'])) {
            return $this->userInfo['id_user'];
        } else {
            return '';
        }
    }
/*RETORNA O USUARIO LOGADO  E SEU EMAIL
 * */
    public function getEmail() {
        if(isset($this->userInfo['email_user'])) {
            return $this->userInfo['email_user'];
        } else {
            return '';
        }
    }

    public function listUser()
    {
        $idUS = $this->userInfo['id_user'];
        $sql = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $sql->bindValue(":id", $idUS);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return $sql->fetch();
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listUser_Grup()
    {
        $infoUSer = null;
        if (!empty($this->listUser())) {
            $f =$this->listUser();
            echo $f;exit;
        }
    }

    /* ESSE METODO FAZ LOGOUT NO SISTEMA
    */
    public function logout()
    {
        unset($_SESSION['userlogin']);
        session_destroy();
        header("Location: " . BASEADMIN . '/login');
    }

    /* METODO ESTA SENDO REPLICADO DO MODEL PERMISSAO, PERMITINDO ASSIM USAR DENTRO
     *DO MODEL USER A VALIDAÇÃO DE PERMISSAO
    */
    public function existPermissao($name) {
        return $this->Permissoes->existPermissao($name);
    }
}
