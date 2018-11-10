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
        $permite = new Permissao();
        $u = new Users();
        $u->setLogUser();



        if ($u->existPermissao('category_view')) {

            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado


            $dados['listCatg'] = $c->listCat_Subcategory($nome_user);


            $this->loadTemplate('noticia/category', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function adminListCat()
    {
        $dados = [];

        $u = new Users();
        $permite = new Permissao();
        $c = new Category;
        $u->setLogUser();

        if ($u->existPermissao('admin_category_view')) {

            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['allCategorias'] = $c->categorias();

            $dados['adminListCat'] = $c->adminlistCat_Subcategory();
            $this->loadTemplate('noticia/adminCategory', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Busca a view de adicionar categorias*/
    public function add()
    {
        $dados = [];

        $u = new Users();
        $permite = new Permissao();
        $c = new Category;
        $u->setLogUser();

        if ($u->existPermissao('add_category_view')) {

            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCatg'] = $c->categoria($nome_user);

            $this->loadTemplate('noticia/add_category', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*adiciona categorias*/
    public function addCat()
    {
        $dados = [];
        $c = new Category;
        $dados_Form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

       
            if(!empty($dados_Form['title_cat']) && $c->setname($dados_Form['title_cat']) == false){

                $cat_title = $dados_Form['title_cat'];
                $cat_content = $dados_Form['content_cat'];
                $cat_autor = Check::Name(strtoupper($dados_Form['autor_cat']));
                $cat_permissao = $dados_Form['permissao_cat'];
                $cat_parent  = $dados_Form['parent_cat'];
                $cat_slug = Check::Name($dados_Form['title_cat']);


                $addC = $c->addcat($cat_title, $cat_content, $cat_autor, $cat_permissao, $cat_parent, $cat_slug);
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
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCatg'] = $c->categoria($nome_user);
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
        $c = new Category;
        $u->setLogUser();

        if ($u->existPermissao('del_category_view')) {

            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCatg'] = $c->categoria($nome_user);


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
        $permite = new Permissao();
        $c = new Category;
        $u->setLogUser();

        if ($u->existPermissao('edit_category_view')) {

            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCatg'] = $c->categoria($nome_user);
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
            $cat_autor   = $dados_Form['autor_cat'];
            $cat_permissao = $dados_Form['permissao_cat'];
            $cat_parent  = $dados_Form['parent_cat'];
            $cat_slug    = Check::Name($dados_Form['title_cat']);
            $id_cat      = $dados_Form['id_cat'];
          
            $dadoCat = $c->updateCategory($cat_title,$cat_autor, $cat_permissao, $cat_content, $cat_parent, $cat_slug, $id_cat);
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
