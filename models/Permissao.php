<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 25/02/18
 * Time: 20:00
 */

class Permissao extends Model
{
    private $grup;
    private $permissions;


    /**
     * @param $permissions
     *seta o grupo de permissoes do usuario junto com as permissoes existentes
     * na tabela de parametro de permissoes e armazena tyodas informações na variavel $permissions.
     */
    public function setGroup($id)
    {
        $this->grup = $id;
        $this->permissions = array();

        $sql = $this->db->prepare("SELECT params_grup_permissao FROM grup_permissao WHERE id_grup_permissao = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $row = $sql->fetch();

            if(empty($row['params_grup_permissao'])) {
                $row['params_grup_permissao'] = '0';
            }

            $params = $row['params_grup_permissao'];

            $sql = $this->db->prepare("SELECT nome_param_permissao FROM param_permissao WHERE id_param_permissao IN ($params)");
            $sql->execute();

            if($sql->rowCount() > 0) {
                foreach($sql->fetchAll() as $item) {
                    $this->permissions[] = $item['nome_param_permissao'];
                }
            }
        }

    }

    /**
     * Verifica se existe   permissoes adicionadas no sistema.
     */
    public function existPermissao($name)
    {
        if(in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Lista todas permissoes da tabela param_permissao
     */
    public function getList()
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM param_permissao");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
    /**
     * Lista todos os grupos da tabela grup_permissao
     */
    public function getGrupList()
    {
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM grup_permissao ");
        $sql->execute();
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    /**
     *@Return e seleciona todas as informações dos Grupos de Permissaõ
     */
    public function getGrup($idGp)
    {
  		$array = array();

		$sql = $this->db->prepare("SELECT * FROM grup_permissao WHERE id_grup_permissao =:id");
		$sql->bindValue(":id", $idGp);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
			$array['params_grup_permissao'] = explode(',', $array['params_grup_permissao']);//transforma o em array os parmetros da tabel
		}

        return $array;
    }
    /**
     *Esse metodo adiciona determinada permissao ao usuario
     */
    public function add($perm_name)
    {
        $sql = $this->db->prepare("INSERT INTO param_permissao (nome_param_permissao) VALUES (:perm_name)");
        $sql->bindValue(":perm_name", $perm_name);
        $sql->execute();

    }

    /**
     *Esse metodo adiciona o grupo de permissao para um usuario correspondente
     */
    public function addGrup($grup_name,$list_permissions) {
        $params = implode(',', $list_permissions);
        $sql = $this->db->prepare("INSERT INTO grup_permissao (nome_grup_permissao, params_grup_permissao) 
        values (:grup_name, :params)");
        $sql->bindValue(":grup_name", $grup_name);
        $sql->bindValue(":params", $params);
        $sql->execute();
    }


    /**
     *Esse metodo exclui determinada permissao ao usuario
     */
    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM param_permissao WHERE id_param_permissao = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    /**
     *Metodo que deleta um Grupo de permissao,mas isso so acontece caso o
     * grupo  não tenha nenhum usuario filiado a ele.
     *  findUsersInGroup() = metodo que verifca se há usuario filiado a um usuario esta na tb USERS
     */
    public function deleteGrup($id) {
        $u = new Users();

        if($u->findUsersInGroup($id) == false) {
            $sql = $this->db->prepare("DELETE FROM grup_permissao WHERE id_grup_permissao= :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
        }
    }
    /**
     *Esse metodo adiciona determinada permissao ao usuario
     */
    public function editGrup($grup_name,$list_permissions, $idGp) {
        $params = implode(',', $list_permissions);

        $sql = $this->db->prepare("UPDATE grup_permissao SET nome_grup_permissao = :grup_name, params_grup_permissao = :params WHERE id_grup_permissao = :id");
        $sql->bindValue(":grup_name", $grup_name);
        $sql->bindValue(":params", $params);
        $sql->bindValue(":id", $idGp);
        $sql->execute();
    }


}