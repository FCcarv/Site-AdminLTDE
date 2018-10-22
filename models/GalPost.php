<?php
/**
 * Classe model das Galerias de Video e Fotos
 *
 */
class GalPost extends Model
{
    /*Faz a leitura na tabela enviando o offset e o limite
    usado na paginação dos videos .
    */
    public function getVideo($offset, $limit)
    {
        $sql = $this->db->prepare("SELECT * FROM videos ORDER BY id_video DESC LIMIT $offset, $limit");
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
    public function totalVideos()
    {
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM videos");
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

/*Insete os videos do you tube ou do vimeo no banco*/
    public function InsertVideo($dataVideo)
    {
        $sql = $this->db->prepare("INSERT INTO videos (titulo_video, thumb_video, descricao_video, embed_video)
              VALUES (:titulo_video,:thumb_video, :descricao_video, :embed_video)");

        $sql->bindValue(":titulo_video",      $dataVideo['titulo_video'], PDO::PARAM_STR);
        $sql->bindValue(":descricao_video",  $dataVideo['descricao_video'], PDO::PARAM_STR);
        $sql->bindValue(":thumb_video",      $dataVideo['thumb_video'], PDO::PARAM_STR);
        $sql->bindValue(":embed_video",      $dataVideo['embed_video'], PDO::PARAM_STR);

        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /*Busca os videos pelo id do video*/
    public function getIdVideo($id_vd)
    {
        $sql = $this->db->prepare("SELECT * FROM videos WHERE id_video = :id_vid");
        $sql->bindValue(":id_vid", $id_vd);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Verifica o status do video se e 0 ou 1, pelo id do video*/
    public function getStatusVideo($id_vd)
    {
        $sql = $this->db->prepare("SELECT status_video FROM videos WHERE id_video = :id_vd");
        $sql->bindValue(":id_vd", $id_vd);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Exclui o video do banco */
    public function delVideo($id_vd)
    {
          $sql = $this->db->prepare("DELETE FROM videos WHERE id_video = :id_vd");
        $sql->bindValue(":id_vd", $id_vd);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Atualiza o status do video no banco*/
    public function upStatusVid($statusVideo, $id_video)
    {
        //var_dump($statusVideo, $id_video);die;
      $sql = $this->db->prepare("UPDATE videos SET status_video =:status_video WHERE id_video= :id_vd");
      $sql->bindValue(":status_video"   , $statusVideo, PDO::PARAM_STR);
      $sql->bindValue(":id_vd"          , $id_video, PDO::PARAM_STR);

        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Seleciona se existe no banco de dados um video com mesmo nome */
    public function setVideo($vid_title)
    {
        $sql = $this->db->prepare("SELECT * FROM videos where titulo_video = :video_title LIMIT 1");
        $sql->bindValue(":video_title", $vid_title);
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
/*#################################################   GALERIA FOTOS   ##############################################################*/

   /*Faz o insert das galerias de fotos no banco de dados */
    public function insertGalleryFts($FormGallery)
    {
        $sql = $this->db->prepare("INSERT INTO fotos_albuns (title_fto_albuns, status_fto_albuns,  cover_fto_albuns, slug_fto_albuns) 
            VALUES (:title_fto_albuns, :status_fto_albuns, :cover_fto_albuns, :slug_fto_albuns)");

        $sql->bindValue(":title_fto_albuns",   $FormGallery['title_galft'], PDO::PARAM_STR);
        $sql->bindValue(":status_fto_albuns",   $FormGallery['status_galft'], PDO::PARAM_STR);
        $sql->bindValue(":cover_fto_albuns",   $FormGallery['img_galft'], PDO::PARAM_STR);
        $sql->bindValue(":slug_fto_albuns",    $FormGallery['slug_galft'], PDO::PARAM_STR);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /*Atualiza as galerias de fotos ,sem a capa ou com a capa*/
    public function updateGalFts($FormGallery)
    {
        if(isset( $FormGallery['img_galft'])){
            $sql = $this->db->prepare("UPDATE fotos_albuns SET title_fto_albuns = :title_fto_albuns, 
                                                                status_fto_albuns = :status_fto_albuns, 
                                                                cover_fto_albuns = :cover_fto_albuns,
                                                                slug_fto_albuns = :slug_fto_albuns  WHERE  id_fto_albuns= :id_fto_albuns");

            $sql->bindValue(":title_fto_albuns",   $FormGallery['title_galft'], PDO::PARAM_STR);
            $sql->bindValue(":status_fto_albuns",   $FormGallery['status_galft'], PDO::PARAM_STR);
            $sql->bindValue(":cover_fto_albuns",   $FormGallery['img_galft'], PDO::PARAM_STR);
            $sql->bindValue(":slug_fto_albuns",    $FormGallery['slug_galft'], PDO::PARAM_STR);
            $sql->bindValue(":id_fto_albuns",      $FormGallery['id_galft'], PDO::PARAM_STR);

        }else{

            $sql = $this->db->prepare("UPDATE fotos_albuns SET title_fto_albuns = :title_fto_albuns, 
                                                            status_fto_albuns = :status_fto_albuns, 
                                                            slug_fto_albuns = :slug_fto_albuns  WHERE  id_fto_albuns = :id_fto_albuns");

            $sql->bindValue(":title_fto_albuns",   $FormGallery['title_galft'], PDO::PARAM_STR);
            $sql->bindValue(":status_fto_albuns",   $FormGallery['status_galft'], PDO::PARAM_STR);
            $sql->bindValue(":slug_fto_albuns",    $FormGallery['slug_galft'], PDO::PARAM_STR);
            $sql->bindValue(":id_fto_albuns",      $FormGallery['id_galft'], PDO::PARAM_STR);
        }
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
/*Seleciona as galerias de fotos por ordem alfabética*/
    public function getGallery()
    {
        $sql = $this->db->prepare("SELECT * FROM fotos_albuns ORDER BY title_fto_albuns ASC");
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
/*Lista ou seleciona os albuns ou galerias de fotos , ajudando e mandando as
informaçoes pra view  e tbm a fazer o create ou add das fotos nas galerias*/
    public function listAlbuns()
    {
        $Album = null;
        if (!empty($this->selectGalFotos())) {
            foreach ($this->selectGalFotos() as $abFt) {
                $Album[] = [

                    'id_fto_albuns'      => $abFt['id_fto_albuns'],
                    'title_fto_albuns'   => $abFt['title_fto_albuns'],
                    'status_fto_albuns'  => $abFt['status_fto_albuns'],
                    'cover_fto_albuns'   => $abFt['cover_fto_albuns'],
                    'slug_fto_albuns'    => $abFt['slug_fto_albuns'],
                    'date_fto_albuns'    => $abFt['date_fto_albuns']
                ];
            }
            return $Album;
        }
    }


    /*verifica o campo status da tabela das galerias ou albuns de fotos*/
    public function setStatusGal($idgl)
    {
        $sql = $this->db->prepare("SELECT status_fto_albuns FROM fotos_albuns WHERE  status_fto_albuns = 1 AND id_fto_albuns = :idgal");
        $sql->bindValue(":idgal", $idgl);
        try {
            $sql->execute();
            if ($sql->rowCount() == 0) {
                return false;
            }else{
                return true;
            }
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }

/*Atualiza o status das galerias de fotos se 0 rascunho ou 1 publicar*/
    public function updStatusGalFts($FormGallery, $idStsGalf)
    {
        if (isset($FormGallery) && !empty($FormGallery)) {
            $sql = $this->db->prepare("UPDATE fotos_albuns SET status_fto_albuns = :status_fto_albuns WHERE  id_fto_albuns= :id_fto_albuns");

            $sql->bindValue(":status_fto_albuns", $FormGallery['status_galft'], PDO::PARAM_STR);
            $sql->bindValue(":id_fto_albuns", $idStsGalf, PDO::PARAM_STR);

            try {
                $sql->execute();
                if ($sql->rowCount() > 0)
                    return $sql->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    /*Seleciona se existe no banco de dados um video com mesmo nome */
    public function setTitleGal($gal_title)
    {
        $sql = $this->db->prepare("SELECT * FROM fotos_albuns WHERE title_fto_albuns = :gal_title LIMIT 1");
        $sql->bindValue(":gal_title", $gal_title);
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
    /*Seleciona as galerias de fotos ou albuns pelo ID*/
    public function getIDGal($id_gal)
    {
        $sql = $this->db->prepare("SELECT * FROM fotos_albuns WHERE id_fto_albuns = :id_gal");
        $sql->bindValue(":id_gal", $id_gal);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Verifica se existe a capa do Album ou galeria*/
    public function setCoverGalFt($id_gal) {
        $sql = $this->db->prepare("SELECT cover_fto_albuns FROM fotos_albuns WHERE id_fto_albuns = :id_gal");
        $sql->bindValue(":id_gal", $id_gal);
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

    /*exclui a galeria ou album de fotos*/
    public function ExcluiGalFt($idGalf)
    {
        $sql = $this->db->prepare("DELETE FROM fotos_albuns WHERE id_fto_albuns = :id_gal");
        $sql->bindValue(":id_gal", $idGalf);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /*Seleciona todas as galerias de fotos  e ordem alfabéteca  pelo titulo do album*/
    public function selectGalFotos()
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos_albuns ORDER BY title_fto_albuns ASC");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*seleciona galetias pelo ID*/
    public function selectGalFotsID($idGalf)
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos_albuns WHERE id_fto_albuns = :id_gal");
        $sql->bindValue(":id_gal", $idGalf);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

/*#################################################   fim GALERIA FOTOS   ##############################################################*/

//============================================   CADASTRAR, EDITAR , DELETAR  AS IMAGENS DAS  GALERIAS


   /*Adiciona fotos aos albuns de fotos*/
    public function addImagesGal($Data)
    {
        $sql = $this->db->prepare("INSERT INTO fotos (id_fto_albuns, cover_foto) VALUES (:id_fto_albuns,:cover_foto)");
        $sql->bindValue(":id_fto_albuns", $Data['id_fto_albuns']);
        $sql->bindValue(":cover_foto", $Data['cover_foto']);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

   /*Seleciona as imagens pelo ID das galerias e albuns de fotos
   E retorna o offset  e  o limite  para a tealização da paginação das imgs.
   */
    public function selectImgID($id_fto, $offset, $limit)
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos WHERE id_fto_albuns = :id_gal LIMIT $offset, $limit");
        $sql->bindValue(":id_gal", $id_fto);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


/*Seleciona as imgs pelo  ID das galetias ou albuns*/
    public function buscaImgID($id_fto)
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos WHERE id_fto_albuns = :id_gal");
        $sql->bindValue(":id_gal", $id_fto);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Faz um foreach buscxando as imgs e coparando com outra selleção a fim de mandar,
     informções para a view que mostra todas imgs de cada galeria de fotos
     e assim executa a paginação das fotos de cada galeria.
    Retornando o ID da galeria*/
    public function  buscaId_gal($id_fto)
    {
        $gall = $this->buscaImgID($id_fto);
        if ($gall == true) {
            foreach ($gall as $valor) {
                $id_foto_album = $valor;
            }
        }
        $id_foto_album = isset($id_foto_album) ? $id_foto_album : "";
       return $id_foto_album;
    }

    /*Seleciona as fotos pelo ID*/
    public function selectFtID($id_fto)
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos WHERE id_foto = :id_ft");
        $sql->bindValue(":id_ft", $id_fto);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /*Deleta as fotos nas galerias ou Album de fotos*/
    public function excluiFt($id_ft)
    {
        $sql = $this->db->prepare("DELETE FROM fotos WHERE id_foto = :id_ft");
        $sql->bindValue(":id_ft", $id_ft);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Retorna o total de fotos pelo ID da galeria ou album de fotos ,
    e assim ajuda na paginação de tesultados*/
    public function totalFotos($id_fto)
    {
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM fotos WHERE id_fto_albuns =:id_ft");
        $sql->bindValue(":id_ft", $id_fto);
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



}