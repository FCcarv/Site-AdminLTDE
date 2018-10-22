<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 21/03/18
 * Time: 19:41
 */

class categoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $u = new Users();
        if ($u->isLogado() == false) {
            header("Location: " . BASEADMIN . "login");
            exit;
        }
    }

    public function index()
    {
        $dados = [];

        $c = new Category;
        $u = new Users();
        $u->setLogUser();

        $dados['listCatg'] = $c->listCat_Subcategory();

        if ($u->existPermissao('category_view')) {


            $this->loadTemplate('noticia/category', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Busca a view de adicionar categorias*/
    public function add()
    {
        $dados = [];

        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('add_category_view')) {
            $c = new Category;
            $dados['listCatg'] = $c->categoria();

            $this->loadTemplate('noticia/add_category', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*adiciona categorias*/
    public function addCat()
    {
        $dados =[];
        $c = new Category;
        $dados_Form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

       
            if(!empty($dados_Form['title_cat']) && $c->setname($dados_Form['title_cat']) == false){

                $cat_title = $dados_Form['title_cat'];
                $cat_content = $dados_Form['content_cat'];
                $cat_parent  = $dados_Form['parent_cat'];
                $cat_slug = Check::Name($dados_Form['title_cat']);

                $addC = $c->addcat($cat_title, $cat_content, $cat_parent, $cat_slug);
                if ($addC == true) {
                    $dados['retorno'] = Alert::AjaxSuccess("Categoria cadastrada com sucesso");
                    $dados['redirect'] = Alert::AjaxRedirect("category");
                }else{
                    $dados['retorno'] = Alert::AjaxDanger("Erro ao cadastrar categoria!!");
                }
            }else{
                $dados['retorno'] = Alert::AjaxWarning("Campo vazio ou Categoria já existe.</br>Por favor digite outro nome!!");
            }
        echo json_encode($dados);
        exit();
    }

/*deleta as subcategorias*/
    public function delCat($id_c)
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('del_category_view')) {
            $c = new Category;
            $dados['listCatg'] = $c->categoria();
            $dados['editCat'] = $c->categoryId($id_c);

          $c->delCategory($id_c);
          header("Location: ".BASEADMIN ."category");
         
        } else {
            header("Location: ". BASEADMIN);
        }
    }
    /*Exclui as categorias , mas verifica se há subcategorias caso exista não exclui.*/
    public function excluirCat()
    {
         $dados = [];
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('del_category_view')) {
            $c = new Category;
            $dados['listCatg'] = $c->categoria();

                if (isset($_POST['id'])){
                    $id = $_POST['id'];
                    $delCat = $c->excluiCategory($id);
                    if ($delCat == true){
                        $dados['retorno'] = Alert::AjaxSuccess("Categoria removida com sucesso");
                        $dados['redirect'] = Alert::AjaxRedirect("category");
                    }else{
                        $dados['retorno'] = Alert::AjaxDanger("A <b>Categoria</b> possui subcategorias cadastradas. Para deletar, antes altere e remova as <b>Subcategorias</b>!!");
                        $dados['redirect'] = Alert::AjaxRedirect("category");
                    }
                }
        }else{
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }

        echo json_encode($dados);
        exit();
    }
    /*Busca a view de editar categorias e  manda informações p mesma */
        public function editCat($id_cat)
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('edit_category_view')) {
            $c = new Category;
            $dados['listCatg'] = $c->categoria();
            $dados['editCat'] = $c->categoryId($id_cat);

            $this->loadTemplate('noticia/up_category', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    /*Realiza o update da categoria */
        public function editarCateg()
   
     {
        $dados = [];
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('edit_category_view')) {
            $dados = [];
            $c = new Category;

            $dados_Form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
            $cat_title   = $dados_Form['title_cat'];
            $cat_content = $dados_Form['content_cat'];
            $cat_parent  = $dados_Form['parent_cat'];
            $cat_slug    = Check::Name($dados_Form['title_cat']);
            $id_cat      = $dados_Form['id_cat'];
          
            $dadoCat = $c->updateCategory($cat_title, $cat_content, $cat_parent, $cat_slug, $id_cat);
            if ($dadoCat == true) {
                $dados['retorno'] = Alert::AjaxSuccess("Categoria atualizada  com sucesso");
                $dados['redirect'] = Alert::AjaxRedirect("category");
            } else {
                $dados['retorno'] = Alert::AjaxDanger("Erro ao atualizar Categoria!!");
                $dados['redirect'] = Alert::AjaxRedirect("category");
            }
        }else{
          $dados['redirect'] = Alert::AjaxRedirect(BASEADMIN."home");
        }
        echo json_encode($dados);
        exit;
    }

    /*Action de teste não esta sendo usada no sistema*/
        public function teste()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();

      
            $this->loadTemplate('noticia/testecategory', $dados);
     
            header("Location: " . BASEADMIN);
        
    }
}
