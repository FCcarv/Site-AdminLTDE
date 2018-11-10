<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 27/10/18
 * Time: 12:00
 */




class jornalPost extends Model
{

    /*Seleciona se existe no banco de dados um video com mesmo nome */
    public function setTitleJorn($jorn_title)
    {
        $sql = $this->db->prepare("SELECT * FROM jornalRegional WHERE titulo_jornal = :jorn_title LIMIT 1");
        $sql->bindValue(":jorn_title", $jorn_title);
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

    public function InsertG_Drive_Link($dataJorn)
    {
        $sql = $this->db->prepare("INSERT INTO jornalRegional (titulo_jornal, link_jornal)
              VALUES (:titulo_jornal, :link_jornal)");

        $sql->bindValue(":titulo_jornal",      $dataJorn['titulo_jornal'], PDO::PARAM_STR);
        $sql->bindValue(":link_jornal",        $dataJorn['link_jornal'], PDO::PARAM_STR);


        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function allgetJornal()
    {
        $sql = $this->db->prepare("SELECT * FROM jornalRegional ORDER  BY titulo_jornal ASC");
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



    public function upArqGoogleDrive($FormJornal)
    {

        $sql = $this->db->prepare("UPDATE jornalRegional SET titulo_jornal = :tituloJornal, link_jornal = :linkJornal
             WHERE id_jornal = :idJornal");

        $sql->bindValue(":tituloJornal",      $FormJornal['jorn_title'], PDO::PARAM_STR);
        $sql->bindValue(":linkJornal",        $FormJornal['jorn_url'], PDO::PARAM_STR);
        $sql->bindValue(":idJornal",          $FormJornal['jorn_id'], PDO::PARAM_STR);
       try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return true;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function setJornID($idJr)
    {
        $sql = $this->db->prepare("SELECT * FROM jornalRegional WHERE id_jornal = :idjornal");
        $sql->bindValue(":idjornal", $idJr, PDO::PARAM_STR);
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

    /*exclui a galeria ou album de fotos*/
    public function ExcluiJornal($idjr)
    {
        $sql = $this->db->prepare("DELETE FROM jornalRegional WHERE id_jornal = :idjornal");
        $sql->bindValue(":idjornal", $idjr);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}