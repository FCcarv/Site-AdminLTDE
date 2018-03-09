<?php

/**
 * User: francisco
 * Date: 06/03/18
 * Time: 16:02
 *
 * CLASSE RESPONSAVEL POR BUSCAR INFORMAÇÕES DO USUARIO , DE MODO QUE O MESMO
 * MANIPULE SEUS DADOS COMO ATUALIZAÇÃO DE SENHA USANDO O SEU EMAIL CADASTRADO NO SISTEMA.
 */
class Usermail extends Model {

    private $User;

/*METODO COMA FUNÇÃO DE BUSCAR O TOKEN ENVIADO VIA LINK DO EMAIL DO USURAIO E
 * VAILDAR E VERIFICAR NO BANCO DE DADOS SE É UM TOKEN VÁLIDO E PEGAR O ID DO USUARIO CADASTRADO
 * NO SISTEMA.
 * */
    public function redefinirSenha($token) {
        $sql = "SELECT * FROM tokens_users WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $token);
        $sql->execute();

        try {
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                return $sql['id_user'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
/*METODO RESPONSAVEL POR ATULIZAR A SENHA USADONDO  O ID DO USUARIO.
 * */
    public function updateSenha($id, $senha) {
        $sql = "UPDATE users SET pass_user = :senha WHERE id_user = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":senha", password_hash($senha, PASSWORD_BCRYPT));
        $sql->bindValue(":id", $id);
        try {
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

/*METODO RESPONSAVEL POR DESABILITAR O TOKEN USADO PARA ATULIAZAR A SENHA.
 * DE MODO QUE O MESMO SO POSSA  SER USADO APENAS UMA UNICA VEZ.
 * */
    public function updateStatusToken($token) {
        $sql = "UPDATE tokens_users SET used = 1 WHERE hash = :hash";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $token);
        try {
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /*
     *SELECIONA E CONFIRMA O EMAIL DO USUARIO  NO BANCO DE DADOS
     *E CRIA UM TOKEN QUE SERA ENVIADO AO EMAIL DO USÚARIO PARA REDEFINIÇÃO DE SENHA.
     */
    public function setToken($fieldEmail) {
        $sql = $this->db->prepare("SELECT * FROM users WHERE email_user = :email");
        $sql->bindValue(":email", $fieldEmail);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $idus = $sql['id_user'];

            $token = md5(time() . rand(0, 99999) . rand(0, 99999));

            $this->User['hash'] = $token;
            $this->User['expirado_em'] = date('Y-m-d H:i', strtotime('+1 months'));
            $this->User['id_user'] = $idus;

            $sql = $this->db->prepare("INSERT INTO tokens_users (hash, expirado_em, id_user) VALUES (:hash, :expirado_em, :iduser)");
            $sql->bindValue(":hash", $this->User['hash']);
            $sql->bindValue(":expirado_em", $this->User['expirado_em']);
            $sql->bindValue(":iduser", $this->User['id_user']);
            $sql->execute();

            if ($sql->rowCount() == 1) {
                return true;
            }
        }
    }

     /*
     *PEGA O TOKEN CRIADOEM OUTRO  METODO setToken
      * E DEFINI O LINK QUE SERA MANDADO PRA O USUARIO PARA DEFINIR UMA NOVA SENHA
     */
    public function setMsgRec() {
        $token = $this->User['hash'];
        $Id = $this->User['id_user'];
        $link = BASEADMIN . "login/recuperar/{$token}";
        return "Clique no link para redefinir sua senha:<br/>" . $link;
    }

}
