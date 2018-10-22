<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 25/02/18
 * Time: 18:19
 */

class permissaoController extends Controller
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

        if ($u->existPermissao('permissions_view')) {
            $permite = new Permissao();
            $dados['permissions_list'] = $permite->getList();
            $dados['permissions_grups_list'] = $permite->getGrupList();

            $this->loadTemplate('login/permissao', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Adiciona pernmissão ao usuario*/
    public function add()
    {
        $dados = [];

        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('permissions_view')) {
            $permite = new Permissao();

            $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

            if (isset($dadosPerm['nome_add']) && !empty($dadosPerm['nome_add'])) {
                $perm_name = $dadosPerm['nome_add'];
                $permite->add($perm_name);

                header("Location: " . BASEADMIN . "permissao");
            }

            $this->loadTemplate('login/permissao_Add', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Deleta permisssao do usuario */
    public function delete($id)
    {
        $dados = [];

        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('permissions_view')) {
            $permite = new Permissao();
            $permite->delete($id);

            header("Location: " . BASEADMIN . "permissao");
        } else {
            header("Location: " . BASEADMIN);
        }
    }
    /*Adiciona um Grupo de Permissão*/
    public function add_grup()
    {
        $dados = [];

        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('permissions_view')) {
            $permite = new Permissao();
            $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

            if(isset($dadosPerm['nome_add_Gp']) && !empty('nome_add_Gp')) {
                $grup_name = $dadosPerm['nome_add_Gp'];
                $list_permissions = $dadosPerm['permissions'];
                $permite->addGrup($grup_name, $list_permissions);


                header("Location: " . BASEADMIN . "permissao");
            }
                $dados['permissions_list'] = $permite->getList();

            $this->loadTemplate('login/permissao_Add_grup', $dados);

        } else {
            header("Location: " . BASEADMIN);
        }

    }

    /*Deleta permisssao do usuario */
    public function delete_Grup($id)
    {
        $u = new Users();
        $u->setLogUser();

        if($u->existPermissao('permissions_view')) {
            $permite = new Permissao();
            $permite->deleteGrup($id);

            header("Location: " . BASEADMIN . "permissao");
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    /*Adiciona um Grupo de Permissão*/
    public function edit_grup($idGp)
    {
        $dados = [];

        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('permissions_view')) {
            $permite = new Permissao();
            $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

            if(isset($dadosPerm['nome_edit_Gp']) && !empty('nome_edit_Gp')) {
                $grup_name = $dadosPerm['nome_edit_Gp'];
                $list_permissions = $dadosPerm['permissions'];
                $permite->editGrup($grup_name, $list_permissions, $idGp);


                header("Location: " . BASEADMIN . "permissao");
            }
            $dados['permissions_list'] = $permite->getList();
            $dados['grup_info'] = $permite->getGrup($idGp);

            $this->loadTemplate('login/permissao_EditGrup', $dados);

        } else {
            header("Location: " . BASEADMIN);
        }

    }

}

