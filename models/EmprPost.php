<?php
/*Classe Model de crud das Empresas clientes*/



class EmprPost extends Model
{
    /*Seleciona se existe no banco de dados um video com mesmo nome */
    public function setTitleEmpr($empr_title)
    {
        $sql = $this->db->prepare("SELECT * FROM clientes_empresas WHERE nome_clientes_empresas = :empr_title LIMIT 1");
        $sql->bindValue(":empr_title", $empr_title);
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
}