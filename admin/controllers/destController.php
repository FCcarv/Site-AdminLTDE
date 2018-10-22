<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 07/10/18
 * Time: 07:51
 */

class destController extends Controller
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
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('destaq_view')) {



            $this->loadTemplate('destaques/destList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    /*Busca a view de adicionar add posts*/
    public function addDest()
    {
        $dados = [];
        $permite = new Permissao();
        $c = new Category;
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('destaq_view')) {

            $dados['listCat_Subc'] = $c->listCat_Subcategory();//categorias e sucategorias
            $dados['listUserinfo'] = $u->listUser();//info do usuario logado
            $dados['grup_List'] = $permite->getGrupList();//grupos e pemissoes de todos usuarios cadastrados no sistema

            $this->loadTemplate('destaques/destCad', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
}