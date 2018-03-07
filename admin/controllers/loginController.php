<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 24/02/18
 * Time: 08:52
 */

class loginController extends Controller
{

    public function index() {
        $dados = [];


        $this->loadView("login/login", $dados);
    }

    public function log()
    {
        $dados = [];

        $user =new Users();
        $dados_form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

        if (in_array('', $dados)) {
            $dados['retorno'] = Alert::AjaxWarning("Por favor preencha todos os campos!!");
        } elseif (!Check::isMail($dados_form['email_us'])) {
            $dados['retorno'] = Alert::AjaxDanger("O email informado não tem um formato válido!!");
        } elseif (($dados_form['pass_us']) == ""){
            $dados['retorno'] = Alert::AjaxDanger("A senha incorreta!!");
        }else{

            if($user->login($dados_form) ==true){
                $dados['retorno'] = Alert::AjaxSuccess("Login efetuado com sucesso. Você será redirecionado... ");

                $dados['redirect'] = Alert::AjaxRedirect("home");
            }
        }
        echo json_encode($dados);
        exit;
    }

    public function logout() {
        $u = new Users();
        $u->logout();
        header("Location: ".BASEADMIN);
    }
}