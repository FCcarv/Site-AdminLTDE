<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 05/11/18
 * Time: 08:06
 */

class UserRepository extends Users
{

    private $dados;

    /*verifica se há alguma imagem cadastrada no banco */
    public function isNullFto($iduser)
    {
        $sql = $this->db->prepare("SELECT foto_user FROM users WHERE foto_user IS NULL AND id_user = :iduser");
        $sql->bindValue(":iduser", $iduser);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ftoExists($iduser)
    {
        $sql = $this->db->prepare("SELECT foto_user FROM users WHERE id_user = :iduser");
        $sql->bindValue(":iduser", $iduser);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*ATUALIZA A FOTO DE PERFIL E APAGA A ANTIGA DA PASTA*/
    public function updateFto($dadosPerm)
    {
        $resFto = $this->isNullFto($dadosPerm['id_us']);
        if($resFto == true){
            if(empty($_FILES['ftos_us']['name'])) {
                $this->dados['retorno'] = Alert::AjaxDanger("<b>Por favor escolha uma imagem de capa!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("users/editUs/{$dadosPerm['id_us']}");
                $this->return_ajax_error($this->dados);
            }
            $this->insertFto($dadosPerm);
        } else {
            $FtPerf =  $this->ftoExists($dadosPerm['id_us']);
            if(!empty($FtPerf)){
                //APAGA  A FOTO DA PASTA
                $coverPerfil = "../admin/assets/img/ft-perfil/". $FtPerf['foto_user'];
                if (file_exists($coverPerfil) && !is_dir($coverPerfil)) {
                    unlink($coverPerfil);
                }
            }
            $this->insertFto($dadosPerm);
        }
    }

    public function delFtoAntiga($dadosPerm)
    {
        $sql = $this->db->prepare("UPDATE users SET foto_user =:fto_us WHERE id_user = :id_us");
        $sql->bindValue(":fto_us", $dadosPerm['ftos_us']);
        $sql->bindValue(":id_us",  $dadosPerm['id_us']);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function insertFto($dadosPerm)
    {   //var_dump($dadosPerm);die;
        //for ($q = 0; $q < count($dadosPerm['ftos_us']['tmp_name']); $q++) {
        $tipo = $dadosPerm['ftos_us']['type'];
        if (!in_array($tipo, array('image/jpeg', 'image/png'))) {
            $this->dados['retorno'] = Alert::AjaxDanger("<b>ERRO TIPO DE ARQUIVO SOMENTE (jpeg e png) !!</b>");
            $this->return_ajax_error($this->dados);

        }else{

            $tmpname = md5(time() . rand(0, 9999)) . '.jpg';
            move_uploaded_file($dadosPerm['ftos_us']['tmp_name'], 'assets/img/ft-perfil/' . $tmpname);

            list($width_orig, $height_orig) = getimagesize('assets/img/ft-perfil/' . $tmpname);
            $ratio = $width_orig / $height_orig;

            $width = 300;
            $height = 300;

            if ($width / $height > $ratio) {
                $width = $height * $ratio;
            } else {
                $height = $width / $ratio;
            }

            $img = imagecreatetruecolor($width, $height);
            if ($tipo == 'image/jpeg') {
                $origi = imagecreatefromjpeg('assets/img/ft-perfil/' . $tmpname);
            } elseif ($tipo == 'image/png') {
                $origi = imagecreatefrompng('assets/img/ft-perfil/' . $tmpname);
            }

            imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
            imagejpeg($img, 'assets/img/ft-perfil/' . $tmpname, 80);

            $this->upUserFto($tmpname, $dadosPerm['id_us']);
        }
    }
    //retorna resposta do ajax
    public function return_ajax_error($data)
    {
        echo json_encode($data);
        exit();
    }
}