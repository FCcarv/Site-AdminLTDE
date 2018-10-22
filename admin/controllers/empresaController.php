<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 07/10/18
 * Time: 07:51
 * Controller responsável pela gestão das informações do layout de banner de enpresas
 */

class empresaController extends Controller
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
        if ($u->existPermissao('empresa_view')) {



            $this->loadTemplate('empresas/empresaList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Busda a view de cadastro de empresas
e manda as informações do banco pra view*/

    public function EmpCad()
    {
        $dados = [];
        $u = new Users();
        $empRp= new EmprRepository();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {


            $this->loadTemplate('empresas/empresaCad', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }


    public function addEmpr()
    {
        $dados = [];
        $u = new Users();
        $empRp= new EmprRepository();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {
            $FormEmpr = filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);






            $this->loadTemplate('empresas/empresaCad', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Busca a view de atualização das empresas
e manda as informações do banco pra view
*/
    public function EmpEdit()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {



            $this->loadTemplate('empresas/empresaEdit', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

}