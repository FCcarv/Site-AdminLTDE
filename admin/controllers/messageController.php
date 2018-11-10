<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 07/10/18
 * Time: 07:51
 */

class messageController extends Controller
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
        $Msg =new MessagePost();
        $u->setLogUser();
        if ($u->existPermissao('msg_view')) {

            $dados['getAllMsg'] = $Msg->getMsg();

            $this->loadTemplate('msg/msgList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }


        public function caddMsg()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('msg_view')) {



            $this->loadTemplate('msg/msgAdd', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function addMsg()
    {
        $dados = [];
        $u = new Users();
        $msgg = new MessageRepository();
        $u->setLogUser();

        $FormMsg = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

        $addMs = $msgg->addMg($FormMsg);
        if ($addMs == true) {
            $dados['retorno'] = Alert::AjaxSuccess("<b>Mensagem <ins> {$FormMsg['msg_title']} </ins> Cadastrada com sucesso!!</b>");
            $dados['redirect'] = Alert::AjaxRedirect("message");
        }else{
            $dados['retorno'] = Alert::AjaxDanger("<b>Erro mensagem <ins> {$FormMsg['msg_title']} </ins> não foi cadastrada.</b>");
            $dados['redirect'] = Alert::AjaxRedirect("message");
        }
        $msgg->return_ajax_error($dados);
    }

    public function editMsg($idMsg)
    {
        $dados = [];
        $u = new Users();
        $Msg =new MessagePost();
        $u->setLogUser();
        if ($u->existPermissao('msg_view')) {
            $dados['getMsgID'] = $Msg->AllMsgID($idMsg);

            $this->loadTemplate('msg/msgEdit', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    /*trabalha junto com o ajax , confirmando se o titulo do post ja existe e verifica se o usuário mantem ou muda*/
    public function postExist(){
        $dados = [];
        $Msg =new MessagePost();
        $msgg = new MessageRepository();
        $dados_Form = filter_input(INPUT_POST,'post_title',FILTER_DEFAULT);

        if ($Msg->setTitle($dados_Form) == true) {
            $dados['postExist'] = true;
            $dados['retorno'] = Alert::AjaxInfo("<b>Esse Titulo <ins>{$dados_Form}</ins> já existe.
                <p>
                <button class='btn btn-primary manterTitlePost'>Manter</button>
                <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                </p>");
            $msgg->return_ajax_error($dados);
        }
    }

    public function upMsg()
    {
        $dados = [];
        $u = new Users();
        $msgg = new MessageRepository();
        $u->setLogUser();

        $FormMsg = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

        $EditaMs = $msgg->editarMsg($FormMsg);
        if ($EditaMs == true) {
            $dados['retorno'] = Alert::AjaxSuccess("<b>Mensagem <ins> {$FormMsg['msg_title']} </ins> atualizada com sucesso!!</b>");
            $dados['redirect'] = Alert::AjaxRedirect("message");
        }else{
            $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao atualizar mensagem <ins>{$FormMsg['msg_title']}</ins></b>");
            $dados['redirect'] = Alert::AjaxRedirect("message");
        }
        $msgg->return_ajax_error($dados);
    }

    public function ExcluiMsg()
    {
        $dados = [];
        $u = new Users();
        $msgg = new MessageRepository();
        $Msg =new MessagePost();
        $u->setLogUser();

        if (isset($_POST['id'])) {
            $idMsg = $_POST['id'];

            //exclui o Album de fotos
            $deletMsg = $Msg->delMessage($idMsg);
            if ($deletMsg == true) {
                $dados['redirect'] = Alert::AjaxRedirect("message");
            }

        } else {
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }
        $msgg->return_ajax_error($dados);
    }
}

