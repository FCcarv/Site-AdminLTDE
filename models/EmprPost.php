<?php
/*Classe Model de crud das Empresas clientes*/



class EmprPost extends Model
{
    /*Seleciona todas as empresas e verifica se eziste outra igual no banco */
    public function setNomeMarcaEmpr($NomeMarca)
    {
        $sql = $this->db->prepare("SELECT * FROM clientes_empresas WHERE marca_cliente_empresa = :marcaNomeEmpr LIMIT 1");
        $sql->bindValue(":marcaNomeEmpr", $NomeMarca);
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


    /*Faz o insert das empresas no banco de dados */
    public function insertEmpr($FormEmpr)
    { //var_dump($FormEmpr);die;
        $sql = $this->db->prepare("INSERT INTO clientes_empresas (nome_cliente_empresa, marca_cliente_empresa, email_cliente_empresa, link_cliente_empresa,
                                                                    telefone_cliente_empresa, cel_cliente_empresa, slug_cliente_empresa, image_cliente_empresa) 
                                                                    VALUES (:nome_cliente_empresa, :marca_cliente_empresa, :email_cliente_empresa, 
                                                                            :link_cliente_empresa, :telefone_cliente_empresa, :cel_cliente_empresa, 
                                                                             :slug_cliente_empresa, :image_cliente_empresa)");

        $sql->bindValue(":nome_cliente_empresa",     $FormEmpr['nome_emp'], PDO::PARAM_STR);
        $sql->bindValue(":marca_cliente_empresa",    $FormEmpr['marca_emp'], PDO::PARAM_STR);
        $sql->bindValue(":email_cliente_empresa",    $FormEmpr['email_emp'], PDO::PARAM_STR);
        $sql->bindValue(":link_cliente_empresa",     $FormEmpr['link_emp'], PDO::PARAM_STR);
        $sql->bindValue(":telefone_cliente_empresa", $FormEmpr['telefone_emp'], PDO::PARAM_STR);
        $sql->bindValue(":cel_cliente_empresa",      $FormEmpr['cel_emp'], PDO::PARAM_STR);
        $sql->bindValue(":slug_cliente_empresa",     $FormEmpr['slug_emp'], PDO::PARAM_STR);
        $sql->bindValue(":image_cliente_empresa",    $FormEmpr['image_emp'], PDO::PARAM_STR);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

/*faz a seleção das empresas no banco de dados e ajuda na paginação das empresas cadastradas*/
    public function getEmpr($offset, $limit)
    {
        $sql = $this->db->prepare("SELECT * FROM clientes_empresas ORDER BY id_cliente_empresa DESC LIMIT $offset, $limit");
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

    /*Faz busca da quantidade de videos para lista los na paginação*/
    public function totalEmpr()
    {
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM clientes_empresas");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                return $row['c'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

/*Busca as empresas pelo ID*/
    public function setEmprID($idEmp)
    {
        $sql = $this->db->prepare("SELECT * FROM clientes_empresas WHERE id_cliente_empresa = :id_emp");
        $sql->bindValue(":id_emp", $idEmp);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Verifica se existe a capa do POst Empresa*/
    public function setCoverEmpr($id_empr) {
        $sql = $this->db->prepare("SELECT image_cliente_empresa FROM clientes_empresas WHERE id_cliente_empresa = :id_empr");
        $sql->bindValue(":id_empr", $id_empr);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }

        /*Atualiza a empresa sem a capa ou com a capa*/
    public function updateEmpresa($FormEmpr)
    {
        if(isset( $FormEmpr['image_emp'])){
            $sql = $this->db->prepare("UPDATE clientes_empresas SET nome_cliente_empresa = :nome_cliente_empresa,
                                                                    marca_cliente_empresa = :marca_cliente_empresa,
                                                                     email_cliente_empresa = :email_cliente_empresa, 
                                                                     link_cliente_empresa = :link_cliente_empresa,
                                                                    telefone_cliente_empresa = :telefone_cliente_empresa, 
                                                                    cel_cliente_empresa = :cel_cliente_empresa, 
                                                                    slug_cliente_empresa = :slug_cliente_empresa, 
                                                                    image_cliente_empresa = :image_cliente_empresa  WHERE  id_cliente_empresa = :id_empr");

            $sql->bindValue(":nome_cliente_empresa",     $FormEmpr['nome_emp'], PDO::PARAM_STR);
            $sql->bindValue(":marca_cliente_empresa",    $FormEmpr['marca_emp'], PDO::PARAM_STR);
            $sql->bindValue(":email_cliente_empresa",    $FormEmpr['email_emp'], PDO::PARAM_STR);
            $sql->bindValue(":link_cliente_empresa",     $FormEmpr['link_emp'], PDO::PARAM_STR);
            $sql->bindValue(":telefone_cliente_empresa", $FormEmpr['telefone_emp'], PDO::PARAM_STR);
            $sql->bindValue(":cel_cliente_empresa",      $FormEmpr['cel_emp'], PDO::PARAM_STR);
            $sql->bindValue(":slug_cliente_empresa",     $FormEmpr['slug_emp'], PDO::PARAM_STR);
            $sql->bindValue(":image_cliente_empresa",    $FormEmpr['image_emp'], PDO::PARAM_STR);
            $sql->bindValue(":id_empr",                  $FormEmpr['id_emp'], PDO::PARAM_STR);

        }else{

            $sql = $this->db->prepare("UPDATE clientes_empresas SET nome_cliente_empresa = :nome_cliente_empresa,
                                                                    marca_cliente_empresa = :marca_cliente_empresa,
                                                                     email_cliente_empresa = :email_cliente_empresa, 
                                                                     link_cliente_empresa = :link_cliente_empresa,
                                                                    telefone_cliente_empresa = :telefone_cliente_empresa, 
                                                                    cel_cliente_empresa = :cel_cliente_empresa, 
                                                                    slug_cliente_empresa = :slug_cliente_empresa WHERE  id_cliente_empresa = :id_empr");

            $sql->bindValue(":nome_cliente_empresa",     $FormEmpr['nome_emp'], PDO::PARAM_STR);
            $sql->bindValue(":marca_cliente_empresa",    $FormEmpr['marca_emp'], PDO::PARAM_STR);
            $sql->bindValue(":email_cliente_empresa",    $FormEmpr['email_emp'], PDO::PARAM_STR);
            $sql->bindValue(":link_cliente_empresa",     $FormEmpr['link_emp'], PDO::PARAM_STR);
            $sql->bindValue(":telefone_cliente_empresa", $FormEmpr['telefone_emp'], PDO::PARAM_STR);
            $sql->bindValue(":cel_cliente_empresa",      $FormEmpr['cel_emp'], PDO::PARAM_STR);
            $sql->bindValue(":slug_cliente_empresa",     $FormEmpr['slug_emp'], PDO::PARAM_STR);
            $sql->bindValue(":id_empr",                  $FormEmpr['id_emp'], PDO::PARAM_STR);
        }
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    /*exclui a empresa cadastrada*/
    public function ExcluiEmpr($idEmp)
    {
        $sql = $this->db->prepare("DELETE FROM clientes_empresas WHERE id_cliente_empresa = :id_empr");
        $sql->bindValue(":id_empr", $idEmp);
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