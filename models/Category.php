<?php
/**
 * Category[ MODEL ADMIN ]
 * Responável por gerenciar as categorias do sistema no admin!
 * @author Francisco
 */

class Category extends Model
{

    private $InfoCat;

    /*Transforma palavras com acentos entre outras ,
    *colocando hifen e retirando acentos, para gravar
    o campo slug no banco de dados*/
    Public function setname($catitle)
    {
            $sql = $this->db->prepare("SELECT * FROM categorias where title_categoria = :catitle LIMIT 1");
			$sql->bindValue(":catitle", $catitle);
			try {
	            $sql->execute();
                if ($sql->rowCount() > 0) {
                    $this->Result = $sql->fetch(PDO::FETCH_ASSOC);
	                return true;
	            }else{
                    return false;
                }
	        } catch (PDOException $e) {
	            die($e->getMessage());
	        }
    }



    public function adminCategory($nomeAt)
    {
        $sql = $this->db->prepare("SELECT autor_categoria FROM categorias WHERE autor_categoria = $nomeAt ");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function parentCategory()
    {
        $sql = $this->db->prepare("SELECT id_categoria FROM categorias WHERE parent_categoria IS NULL ");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /*seleciona as categorias atraves do Id*/
    public function idCategoria()
    {
        $sql = $this->db->prepare("SELECT id_categoria FROM categorias WHERE parent_categoria IS NULL ORDER BY title_categoria ASC");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /*Busca as castegorias de acordo com campo parent_categoria,
*selecionnando apenas as categorias.
*/
    public function categoria($nome_user)
    {
        $sql = $this->db->prepare("SELECT * FROM categorias WHERE parent_categoria IS NULL AND autor_categoria = :nameUser ORDER BY title_categoria ASC");
        $sql->bindValue(":nameUser", $nome_user);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

/*Seleciona as subcategorias*/
    public function subCategory($cat_id,$nome_user) {
        $sql = $this->db->prepare("SELECT * FROM categorias WHERE parent_categoria = :cat_id AND autor_categoria = :nameUser ORDER BY date_categoria DESC");
        $sql->bindValue(":cat_id", $cat_id);
        $sql->bindValue(":nameUser", $nome_user);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /*Faz uma listaagem das categorias e sbcategorias, é usado no update das categorias*/
    public function listCat_Subcategory($nome_user)
    {
        $categorias = null;
        if (!empty($this->categoria($nome_user))) {
            foreach ($this->categoria($nome_user) as $categ) {
                $categorias[] = [

                    'id_categoria'       => $categ['id_categoria'],
                    'parent_categoria'   => $categ['parent_categoria'],
                    'title_categoria'    => $categ['title_categoria'],
                    'content_categoria'  => $categ['content_categoria'],
                    'autor_categoria'    => $categ['autor_categoria'],
                    'permissao_categoria'=> $categ['permissao_categoria'],
                    'date_categoria'     => $categ['date_categoria'],
                    'slug_categoria'     => $categ['slug_categoria'],
                    'sub_categoria'      => $this->subCategory($categ['id_categoria'], $nome_user)
                ];
            }
            return $categorias;
        }
    }

    #######################################  SOMENTE ADMIN CATEGORIAS################################################################
    /*Busca as castegorias de acordo com campo parent_categoria,
*selecionnando apenas as categorias.
*/
    public function categorias()
    {
        $sql = $this->db->prepare("SELECT * FROM categorias WHERE parent_categoria IS NULL ORDER BY title_categoria ASC");
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /*Seleciona as subcategorias*/
    public function subCategorias($cat_id) {
        $sql = $this->db->prepare("SELECT * FROM categorias WHERE parent_categoria = :cat_id ORDER BY date_categoria DESC");
        $sql->bindValue(":cat_id", $cat_id);
         try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /*Faz uma listaagem de todas categorias e sbcategorias, é visto somente pello admin*/
    public function adminlistCat_Subcategory()
    {
        $allCategorias = null;
        if (!empty($this->categorias())) {
            foreach ($this->categorias() as $cat) {
                $allCategorias[] = [

                    'id_categoria'       => $cat['id_categoria'],
                    'parent_categoria'   => $cat['parent_categoria'],
                    'title_categoria'    => $cat['title_categoria'],
                    'content_categoria'  => $cat['content_categoria'],
                    'autor_categoria'    => $cat['autor_categoria'],
                    'permissao_categoria'=> $cat['permissao_categoria'],
                    'date_categoria'     => $cat['date_categoria'],
                    'slug_categoria'     => $cat['slug_categoria'],
                    'sub_categoria'      => $this->subCategorias($cat['id_categoria'])
                ];
            }
            return $allCategorias;
        }
    }
#######################################  FIM SOMENTE ADMIN CATEGORIAS################################################################
    /*Adiciona as categorias no n banco*/
    public function addcat($cat_title, $cat_content, $cat_autor, $cat_permissao, $cat_parent = null, $cat_slug)
    {
        
        if ($cat_parent == null) {
            $sql = $this->db->prepare("INSERT INTO categorias  (title_categoria, content_categoria, autor_categoria, permissao_categoria, parent_categoria, slug_categoria) VALUES (:cat_title,:cat_content, :cat_autor, :cat_perm, :cat_parent, :cat_slug)");
            $sql->bindValue(":cat_title", $cat_title);
            $sql->bindValue(":cat_content", $cat_content);
            $sql->bindValue(":cat_autor", ucwords($cat_autor));
            $sql->bindValue(":cat_perm", $cat_permissao);
            $sql->bindValue(":cat_parent", NULL);
            $sql->bindValue(":cat_slug", $cat_slug);
            
        } else {
            $sql = $this->db->prepare("INSERT INTO categorias  (title_categoria, content_categoria, autor_categoria, permissao_categoria, parent_categoria, slug_categoria) VALUES (:cat_title,:cat_content, :cat_autor, :cat_perm, :cat_parent, :cat_slug)");
            $sql->bindValue(":cat_title", $cat_title);
            $sql->bindValue(":cat_content", $cat_content);
            $sql->bindValue(":cat_autor", ucwords($cat_autor));
            $sql->bindValue(":cat_perm", $cat_permissao);
            $sql->bindValue(":cat_parent", $cat_parent);
            $sql->bindValue(":cat_slug", $cat_slug);
        }  try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
 /*busca as categorias pelo ID*/
    public function categoryId($id_cat)
    {
        $sql = $this->db->prepare("SELECT * FROM categorias WHERE id_categoria = :id_cat LIMIT 1");
        $sql->bindValue(":id_cat", $id_cat);
        try {
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    
  /*Atusliza as categorias e subcategorias*/
    public function updateCategory($cat_title,  $cat_autor, $cat_permissao, $cat_content, $cat_parent, $cat_slug, $id_cat)
    {
        if ($cat_parent == null) {
            $sql = $this->db->prepare("UPDATE categorias SET title_categoria =:title_ct, autor_categoria = :autor_ct, permissao_categoria = :permissao_ct, content_categoria = :content_ct, parent_categoria =:parent_ct, slug_categoria = :slug_ct WHERE id_categoria= :id_cat");
                $sql->bindValue(":title_ct",      $cat_title);
                $sql->bindValue(":content_ct",    $cat_content);
                $sql->bindValue(":autor_ct",      $cat_autor);
                $sql->bindValue(":permissao_ct",  $cat_permissao);
                $sql->bindValue(":parent_ct",     NULL);
                $sql->bindValue(":slug_ct",       $cat_slug);
                $sql->bindValue(":id_cat",        $id_cat);
        } else {
           $sql = $this->db->prepare("UPDATE categorias SET title_categoria =:title_ct, autor_categoria = :autor_ct, permissao_categoria = :permissao_ct, content_categoria = :content_ct, parent_categoria =:parent_ct, slug_categoria = :slug_ct WHERE id_categoria= :id_cat");
                $sql->bindValue(":title_ct",      $cat_title);
                $sql->bindValue(":content_ct",    $cat_content);
                $sql->bindValue(":autor_ct",      $cat_autor);
                $sql->bindValue(":permissao_ct",  $cat_permissao);
                $sql->bindValue(":parent_ct",     $cat_parent);
                $sql->bindValue(":slug_ct",       $cat_slug);
                $sql->bindValue(":id_cat",        $id_cat);
        }
        try {
            $sql->execute();
            if ($sql->rowCount() == 1)
                return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
       /*Deleta as categorias filhas*/
    public function delCategory($id_c)
    {
        $sql = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = :id");
        $sql->bindValue(":id", $id_c);
           try {
            $sql->execute();
            if ($sql->rowCount() == 1){
            return true;
           }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

        /*Deleta as categorias mae,mas preimeiro verifica se há categorias filhas ,caso existya não exclui*/
        public function excluiCategory($id_cat)
        {
            $idCat = $this->subCategory($id_cat);
            if ($idCat == false){
                $sql = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = :id");
                $sql->bindValue(":id", $id_cat);
                try {
                    $sql->execute();
                    if ($sql->rowCount() == 1){
                        return true;
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                return true;
            }else{
                return false;
            }

        }

    }