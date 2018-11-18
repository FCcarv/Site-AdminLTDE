<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 30/10/18
 * Time: 20:33
 */


class MessagePost extends Model
{
    /*Seleciona se existe no banco de dados um video com mesmo nome */
    public function setTitle($title)
    {
        $sql = $this->db->prepare("SELECT * FROM mensagens WHERE titulo_mensagem = :msgTitle LIMIT 1");
        $sql->bindValue(":msgTitle", $title);
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

    //
    /*Insete os videos do you tube ou do vimeo no banco*/
    public function addMessage($FormMsg)
    {
        $sql = $this->db->prepare("INSERT INTO mensagens (titulo_mensagem, descricao_mensagem, autor_mensagem, fonte_mensagem)
              VALUES (:tituloMsg,:descricaoMsg, :autorMsg, :fonteMsg)");

        $sql->bindValue(":tituloMsg",     $FormMsg['msg_title'], PDO::PARAM_STR);
        $sql->bindValue(":descricaoMsg",  $FormMsg['msg_desc'], PDO::PARAM_STR);
        $sql->bindValue(":autorMsg",      $FormMsg['msg_autor'], PDO::PARAM_STR);
        $sql->bindValue(":fonteMsg",      $FormMsg['msg_fonte'], PDO::PARAM_STR);

        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

     public function getMsg()
    {
        $sql = $this->db->prepare("SELECT * FROM mensagens ORDER BY id_mensagem DESC");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function AllMsgID($idMsg)
    {
        $sql = $this->db->prepare("SELECT * FROM mensagens WHERE id_mensagem = :id_msg");
        $sql->bindValue(":id_msg",     $idMsg, PDO::PARAM_INT);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateMessage($FormMsg)
    {
        $sql = $this->db->prepare("UPDATE mensagens SET titulo_mensagem = :title_msg, descricao_mensagem = :desc_msg, autor_mensagem = :autor_msg, fonte_mensagem = :font_msg WHERE  id_mensagem = :id_msg");

            $sql->bindValue(":title_msg",    $FormMsg['msg_title'], PDO::PARAM_STR);
            $sql->bindValue(":desc_msg",     $FormMsg['msg_desc'], PDO::PARAM_STR);
            $sql->bindValue(":autor_msg",    $FormMsg['msg_autor'], PDO::PARAM_STR);
            $sql->bindValue(":font_msg",     $FormMsg['msg_fonte'], PDO::PARAM_STR);
            $sql->bindValue(":id_msg",       $FormMsg['msg_id'], PDO::PARAM_STR);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /*Deleta imagens da galeria*/
    public function delMessage($idMsg)
    {
        $sql = $this->db->prepare("DELETE FROM mensagens WHERE id_mensagem = :id_Msg");
        $sql->bindValue(":id_Msg", $idMsg);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}//