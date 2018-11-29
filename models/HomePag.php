<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 15/11/18
 * Time: 17:20
 */

class HomePag extends Model
{
   /*Faz uma busca no banco de dados e tras somente  posts de user  mivel 4*/
    public function PostsView()
    {
        $sql = $this->db->prepare("SELECT * FROM posts p INNER JOIN users u WHERE p.autor_post = u.nome_user AND u.id_grup_permissao = 4 ORDER BY title_post ASC, date_post DESC LIMIT 6");

       //$sql = $this->db->prepare("SELECT * FROM posts WHERE permissao_post = 4 ORDER BY status_post ASC, date_post DESC");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }//
    }

    /*Seleciona apenas 3 de todos posts como Destaques*/
    public function PostsDestaques()
    {
        $sql = $this->db->prepare("SELECT * FROM posts ORDER BY status_post  ASC, date_post DESC LIMIT 3");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }//
    }
//Exibe a mensagem mais recente cadastrada
    public function getMsgHome()
    {
        $sql = $this->db->prepare("SELECT * FROM mensagens ORDER BY id_mensagem DESC LIMIT 3");
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

    //Busca info dos navegadores usados em visitas ao site
    public function getBrowsers()
    {
        $sql = $this->db->prepare("SELECT * FROM siteviews_agent ORDER BY views_agent DESC LIMIT 4");
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
//Browsers usados pelo usuario
    public function getTotalViewsNav()
    {
        $sql = $this->db->prepare("SELECT SUM(views_agent) AS Views FROM siteviews_agent");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $row[0]['Views'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
//Quantidades de Usuarios
    public function getTotalViewsUser()
    {
        $sql = $this->db->prepare("SELECT SUM(users_siteviews) AS UsersView FROM siteviews");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $row[0]['UsersView'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Quantidades de Visitas do site
    public function getTotalViews()
    {
        $sql = $this->db->prepare("SELECT SUM(views_siteviews) AS ViewsSite FROM siteviews");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $row[0]['ViewsSite'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Quantidades de paginas Visitadas do site
    public function getTotalPages()
    {
        $sql = $this->db->prepare("SELECT SUM(pages_siteviews) AS Pages FROM siteviews");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $row[0]['Pages'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Quantidades de posts do site
    public function getTotalPosts()
    {
        $sql = $this->db->prepare("SELECT * FROM posts");
        try {
            $sql->execute();

             return $sql->rowCount();

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    ######################################### FRONT BUSCAS E LEITURAS ##########################################

    public function editor_list()
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE id_grup_permissao = 4 ORDER BY nome_user ASC, registro_user DESC LIMIT 6");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql= $sql->fetchAll(PDO::FETCH_ASSOC);
                return $sql;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Seleciona apenas 3 de todos posts como Destaques*/
    public function PostsFront()
    {
        $sql = $this->db->prepare("SELECT * FROM posts ORDER BY status_post  ASC LIMIT 9");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }//
    }


    /*Seleciona apenas 3 de todos posts como Destaques*/
    public function postsPag($slugPosts)
    {
        $sql = $this->db->prepare("SELECT * FROM posts WHERE slug_post= :slugPosts");
        $sql->bindValue(":slugPosts", $slugPosts);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }//
    }


    /*##################################################GALERIA DE FOTOS#########################################################*/
    /*Seleciona as galerias de fotos por ordem alfabética*/
    public function GalleryFts()
    {
        $sql = $this->db->prepare("SELECT * FROM fotos_albuns WHERE status_fto_albuns = 1 ORDER BY title_fto_albuns ASC LIMIT 6");
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

    /*Seleciona as imagens pelo ID das galerias e albuns de fotos*/
    public function ImgGftID($id_fto)
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos WHERE id_fto_albuns = :id_gal");
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

    /*seleciona galetias pelo ID*/
    public function selectGalFotsSlug($slugft)
    {
        $sql = $this->db->prepare ("SELECT * FROM fotos_albuns WHERE slug_fto_albuns = :slugft");
        $sql->bindValue(":slugft", $slugft);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*################################################# VIDEOS #####################################3*/
    /*Faz a leitura na tabela enviando o offset e o limite
    usado na paginação dos videos .
    */
    public function VideosFront()
    {
        $sql = $this->db->prepare("SELECT * FROM videos WHERE status_video ORDER BY id_video DESC LIMIT 6");
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

    #####################################   Empresas   ###################################################################

    /*faz a seleção das empresas no banco de dados e ajuda na paginação das empresas cadastradas*/
    public function company()
    {
        $sql = $this->db->prepare("SELECT * FROM clientes_empresas ORDER BY id_cliente_empresa");
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


    public function Msgs()
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

}