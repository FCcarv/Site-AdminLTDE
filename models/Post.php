<?php
/**
 * Classe model de postagens  de  fatos e notícias
 */
class Post extends Model
{



    public function addposts($dados_Form)
    {
        $dados_Form['content_post'] = str_replace('\\' , "", trim($dados_Form['content_post']));

        $sql = $this->db->prepare("INSERT INTO posts (title_post, subtitle_post, content_post, 
            categoria_post, cat_parent_post, type_post , cover_post, autor_post, permissao_post, status_post, slug_post) 
            VALUES (:title_post,:subtitle_post, :content_post, :categoria_post, :catparent_post,:type_post, :cover_post, :autor_post, 
            :permissao_post ,:status_post,:slug_post)");

        $sql->bindValue(":title_post",      $dados_Form['title_post'], PDO::PARAM_STR);
        $sql->bindValue(":subtitle_post",   $dados_Form['subtitle_post'], PDO::PARAM_STR);
        $sql->bindValue(":content_post",    $dados_Form['content_post'], PDO::PARAM_STR);
        $sql->bindValue(":categoria_post",  $dados_Form['subcat_post'], PDO::PARAM_INT);
        $sql->bindValue(":catparent_post",  $dados_Form['Catparent_post'], PDO::PARAM_INT);
        $sql->bindValue(":type_post",       $dados_Form['type_post'], PDO::PARAM_STR);
        $sql->bindValue(":cover_post",      $dados_Form['cap_post'], PDO::PARAM_STR);
        $sql->bindValue(":autor_post",      $dados_Form['autor_post'], PDO::PARAM_STR);
        $sql->bindValue(":permissao_post",  $dados_Form['permissao_post'], PDO::PARAM_STR);
        $sql->bindValue(":status_post",     $dados_Form['status_post'], PDO::PARAM_INT);
        $sql->bindValue(":slug_post",       $dados_Form['slug_post'], PDO::PARAM_STR);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    /*Verifica se existe a capa do post * */
    public function SelcoverPost($id_post) {
        $sql = $this->db->prepare("SELECT cover_post FROM posts WHERE id_post = :id_post");
        $sql->bindValue(":id_post", $id_post);
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

    /*Seleciona um unico  titulo do post se tiver com mesmo nome */
    public function setpost($post_title)
    {
        $sql = $this->db->prepare("SELECT * FROM posts where title_post = :post_title LIMIT 1");
        $sql->bindValue(":post_title", $post_title);
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

    /*Adiciona a galeria de fotos no post*/
    public function addgallery($Data)
    {
        $sql = $this->db->prepare("INSERT INTO posts_gallery (id_post, image_gallery) VALUES (:id_post,:image_gallery)");

        $sql->bindValue(":id_post", $Data['id_post']);
        $sql->bindValue(":image_gallery", $Data['image_gallery']);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return $this->db->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Busca todos  os posts pelo seus respectivos ids*/
    public function getPosts($id_post)
    {
        $sql = $this->db->prepare("SELECT * FROM posts WHERE id_post = :id_post");
        $sql->bindValue(":id_post", $id_post);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }//
    }

    /*Seleciona os posts*/
    //public function Posts($nome_user, $idGpPerm, $offset, $limit)
    public function Posts($nome_user, $idGpPerm, $offset, $limit)
    {
      if ($idGpPerm == 1){
          $sql = $this->db->prepare("SELECT * FROM posts ORDER BY status_post ASC, date_post DESC LIMIT $limit OFFSET $offset");
      }else{
          $sql = $this->db->prepare("SELECT * FROM posts WHERE permissao_post = :id_permissao AND autor_post = :nameUser ORDER BY status_post ASC, date_post DESC LIMIT $limit OFFSET $offset");
          $sql->bindValue(":id_permissao", $idGpPerm);
          $sql->bindValue(":nameUser", $nome_user);
      }
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }//
    }


    /*mostra as imagens da galeria existe naquele post*/
    public function ImgGallery($id_post)
    {
        $sql = $this->db->prepare("SELECT * FROM posts_gallery WHERE id_post = :id_post");
        $sql->bindValue(":id_post", $id_post);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function EditarPostCover($dados_Form)
    {
        if(!empty($dados_Form['cap_post'])){
            /*  && ($this->SelcoverPost() == false)&& file_exists("../uploads/{$dados_Form['cap_post']}") && !is_dir("../uploads/{$dados_Form['cap_post']}")){
              unlink("../uploads/{$dados_Form['cap_post']}");*/
            $Upload = new Upload('../uploads/');
            $Upload->Image($dados_Form['cap_post'], Check::Name($dados_Form['title_post']), 1600, 'posts');
            $dados_Form['cap_post'] = $Upload->getResult();
            // adiciona os dados no banco

        }
    }

    /*Atualiza os posts  ao usuario escolher com capa ou sem*/
    public function updatePosts($dados_Form)
    {
        $dados_Form['content_post'] = str_replace('\\' , "", trim($dados_Form['content_post']));

        if (isset($dados_Form['cap_post'])) {
            $sql = $this->db->prepare("UPDATE posts SET title_post = :title_post, 
                                                        status_post= :status_post,
                                                        subtitle_post = :subtitle_post, 
                                                        content_post = :content_post, 
                                                        categoria_post =:categoria_post, 
                                                        cat_parent_post= :catparent_post,
                                                        autor_post= :autor_post, 
                                                        permissao_post= :permissao_post, 
                                                        type_post = :type_post, 
                                                        slug_post= :slug_post,
                                                        cover_post = :cover_post WHERE id_post = :id_post");

            $sql->bindValue(":title_post",      $dados_Form['title_post'], PDO::PARAM_STR);
            $sql->bindValue(":status_post",     $dados_Form['status_post'], PDO::PARAM_STR);
            $sql->bindValue(":subtitle_post",   $dados_Form['subtitle_post'], PDO::PARAM_STR);
            $sql->bindValue(":content_post",    $dados_Form['content_post'], PDO::PARAM_STR);
            $sql->bindValue(":categoria_post",  $dados_Form['subcat_post'], PDO::PARAM_STR);
            $sql->bindValue(":catparent_post",  $dados_Form['Catparent_post'], PDO::PARAM_INT);
            $sql->bindValue(":autor_post",      $dados_Form['autor_post'], PDO::PARAM_STR);
            $sql->bindValue(":permissao_post",  $dados_Form['permissao_post'], PDO::PARAM_STR);
            $sql->bindValue(":type_post",       $dados_Form['type_post'], PDO::PARAM_STR);
            $sql->bindValue(":slug_post",       $dados_Form['slug_post'], PDO::PARAM_STR);
            $sql->bindValue(":cover_post",      $dados_Form['cap_post'], PDO::PARAM_STR);
            $sql->bindValue(":id_post",         $dados_Form['id_post'], PDO::PARAM_INT);

        }else{

            //var_dump($dados_Form);die();
            $sql = $this->db->prepare("UPDATE posts SET title_post = :title_post, 
                                                        status_post= :status_post,
                                                        subtitle_post = :subtitle_post, 
                                                        content_post = :content_post, 
                                                        categoria_post =:categoria_post, 
                                                        cat_parent_post= :catparent_post,
                                                        autor_post= :autor_post, 
                                                        permissao_post= :permissao_post, 
                                                        type_post = :type_post, 
                                                        slug_post= :slug_post WHERE id_post = :id_post");

            $sql->bindValue(":title_post",      $dados_Form['title_post'], PDO::PARAM_STR);
            $sql->bindValue(":status_post",     $dados_Form['status_post'], PDO::PARAM_STR);
            $sql->bindValue(":subtitle_post",   $dados_Form['subtitle_post'], PDO::PARAM_STR);
            $sql->bindValue(":content_post",    $dados_Form['content_post'], PDO::PARAM_STR);
            $sql->bindValue(":categoria_post",  $dados_Form['subcat_post'], PDO::PARAM_STR);
            $sql->bindValue(":catparent_post",  $dados_Form['Catparent_post'], PDO::PARAM_INT);
            $sql->bindValue(":autor_post",      $dados_Form['autor_post'], PDO::PARAM_STR);
            $sql->bindValue(":permissao_post",  $dados_Form['permissao_post'], PDO::PARAM_STR);
            $sql->bindValue(":type_post",       $dados_Form['type_post'], PDO::PARAM_STR);
            $sql->bindValue(":slug_post",       $dados_Form['slug_post'], PDO::PARAM_STR);
            $sql->bindValue(":id_post",         $dados_Form['id_post'], PDO::PARAM_INT);

        }
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

    /*verifica o campo status da tabela*/
    public function setStatus($idpost)
    {
        $sql = $this->db->prepare("SELECT status_post FROM posts WHERE  status_post = 1 AND id_post = :idpost");
        $sql->bindValue(":idpost", $idpost);
        try {
            $sql->execute();
            $sql->fetch(PDO::FETCH_ASSOC);

            if ($sql->rowCount() == 0) {
                return false;
            }else{
                return true;
            }
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //busca todos posts e seus status
    public function getStatus()
    {
        $sql = $this->db->prepare("SELECT status_post FROM posts WHERE status_post = 0");
        try {
            $sql->execute();
            if ($sql->rowCount() === 0){
                $sql->fetchAll(PDO::FETCH_ASSOC);
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Verifica se existe img galery * */
    public function SelGallery($id_g) {
        $sql = $this->db->prepare("SELECT image_gallery FROM posts_gallery WHERE id_gallery = :id_gal");
        $sql->bindValue(":id_gal", $id_g);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                return $row;
            }else{
                return false;
            }
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Busca as imagens da galeria que estam vinculada a um determinado id de um post */
    public function SelImgGal($id_p) {
        $sql = $this->db->prepare("SELECT * FROM posts_gallery WHERE id_post = :id_p");
        $sql->bindValue(":id_p", $id_p);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            }else{
                return false;
            }
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /*Deleta os posts*/
    public function excluiPost($id_post)
    {
        $sql = $this->db->prepare("DELETE FROM posts WHERE id_post = :idpt");
        $sql->bindValue(":idpt", $id_post);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Deleta os galeria inteira do pos*/
    public function excluiGallery($id_post)
    {
        $sql = $this->db->prepare("DELETE FROM posts_gallery WHERE id_post = :idpt");
        $sql->bindValue(":idpt", $id_post);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /*Deleta imagens da galeria*/
    public function delGal($id_g)
    {
        $sql = $this->db->prepare("DELETE FROM posts_gallery WHERE id_gallery = :id_gallery");
        $sql->bindValue(":id_gallery", $id_g);
        try {
            $sql->execute();
            if ($sql->rowCount() == 1){
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*PAGINAÇÃO
    *Metodo que busca o total de itens da paginação
    */
    public function totalItens()
    {
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM posts");
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