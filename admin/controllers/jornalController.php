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
        $jr= new JornalPost();
        $u->setLogUser();
        if ($u->existPermissao('jornal_view')) {

            $dados['getJornal'] = $jr->allgetJornal();

            $this->loadTemplate('jornal/jornalList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function caddJornal()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('jornal_view')) {

            $this->loadTemplate('jornal/addJornal', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function addJornal()
    {
        $dados = [];
        $u = new Users();
        $jRep = new JornalRepository();
        $u->setLogUser();
        if ($u->existPermissao('jornal_view')) {

            $FormJornal= filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

            $CreateJr = $jRep->setArqGoogleDrive($FormJornal);
            if (isset($CreateJr) && $CreateJr == true) {
                $dados['retorno'] = Alert::AjaxSuccess("<b>O Documento <ins>{$FormJornal['jorn_title']}</ins> foi cadastrado com sucesso!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("jornal");
            } else {
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao cadastrar <ins>{$FormJornal['jorn_title']}</ins></b>");
                $dados['redirect'] = Alert::AjaxRedirect("jornal");
            }
            $jRep->return_ajax_error($dados);

        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function editJornal($idJr)
    {
        $dados = [];
        $u = new Users();
        $jr = new JornalPost();
        $u->setLogUser();
        if ($u->existPermissao('jornal_view')) {
            $dados['setJornalID'] = $jr->setJornID($idJr);
            $this->loadTemplate('jornal/editaJornal', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function postExist()
    {
        $dados = [];
        $jr = new JornalPost();
        $jRep = new JornalRepository();

        $dados_Form = filter_input(INPUT_POST, 'post_title', FILTER_DEFAULT);

        if ($jr->setTitleJorn($dados_Form) == true) {
            $dados['postExist'] = true;
            $dados['retorno'] = Alert::AjaxInfo("<b>Esse Titulo <ins>{$dados_Form}</ins> já existe.
                <p>
                <button class='btn btn-primary manterTitlePost'>Manter</button>
                <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                </p>");
            $jRep->return_ajax_error($dados);
        }
    }

        public function upJornal()
    {
        $dados = [];
        $u = new Users();
        $jRep = new JornalRepository();
        $jr = new jornalPost();
        $u->setLogUser();
        if ($u->existPermissao('jornal_view')) {

            $FormJornal= filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
            $jorn_slug = 'jr-'. $FormJornal['jorn_title'];
            $FormJornal['jorn_slug'] = Check::Name($jorn_slug);

            $UpdateJr = $jRep->updateJornal($FormJornal);
            if (isset($UpdateJr) && $UpdateJr == true) {

                $dados['retorno'] = Alert::AjaxSuccess("<b>A <ins>{$FormJornal['jorn_title']}</ins> foi atualizado com sucesso!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("jornal");

            } else {
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao atualizar '<ins>{$FormJornal['jorn_title']}</ins>'</b>");
                $dados['redirect'] = Alert::AjaxRedirect("jornal");
            }
            $jRep->return_ajax_error($dados);
        } else {
            header("Location: " . BASEADMIN. "homer");
        }
    }


    public function excluiJornal()
    {
        $dados = [];
        $u = new Users();
        $jRep = new JornalRepository();
        $jr = new jornalPost();
        $u->setLogUser();

        if (isset($_POST['id'])) {
            $idJorn = $_POST['id'];

            //exclui o Album de fotos
            $deletJornal = $jr->ExcluiJornal($idJorn);
            if ($deletJornal == true) {
                $dados['redirect'] = Alert::AjaxRedirect("jornal");
            }

        } else {
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }
        $jRep->return_ajax_error($dados);
    }
}