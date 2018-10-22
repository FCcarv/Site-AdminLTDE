<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 07/10/18
 * Time: 07:51
 */

class jornalController extends Controller
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
        if ($u->existPermissao('jornal_view')) {



            $this->loadTemplate('jornal/jornalList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
}