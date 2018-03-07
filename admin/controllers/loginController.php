<?php
require '../App/Library/Mailer/PHPMailerException.php';
require '../App/Library/Mailer/SMTP.php';
require '../App/Library/Mailer/PHPMailer.php';

use App\Library\Mailer\PHPMailerException;
use App\Library\Mailer\SMTP;
use App\Library\Mailer\PHPMailer;
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

    public function cadastra() {
        $dados = [];

        $this->loadView("login/cadastrar", $dados);
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
                $dados['retorno'] = Alert::AjaxSuccess("Login efetuado com sucesso.Você será redirecionado... ");

                $dados['redirect'] = Alert::AjaxRedirect("home");
            }
        }
        echo json_encode($dados);
        exit;
    }


    public function add() {
        $dados = [];

        $dados_form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        $user =new Users();

        if (in_array('', $dados_form)) {
            $dados['retorno'] = Alert::AjaxWarning("Por favor preencha todos os campos!!");
        } elseif (!Check::isMail($dados_form['email_us'])) {
            $dados['retorno'] = Alert::AjaxWarning("O email informado não tem um formato válido!!");
        } elseif (isset($dados_form['pass_us']) && (strlen($dados_form['pass_us']) < 6 || strlen($dados_form['pass_us']) >= 9)){
            $dados['retorno'] = Alert::AjaxWarning("A senha deve ter entre 6 e 8 caracteres!!");
            //}elseif ($user->checkCreateLogin($dados_form[id_user])){
            //$dados['retorno'] = Alert::AjaxWarning("Somente Administradores estão autorizados a cadastrar usuários!!");
        }elseif ($user->LoginCreate($dados_form)){
            $dados['retorno'] = Alert::AjaxSuccess("Parabéns cadastro realizado com sucesso!!");
        }
        echo json_encode($dados);
        exit;
    }

    public function key()
    {
        $dados = [];


        $this->loadView("login/esqSenha", $dados);
    }

    public function esqueciSenha()
    {
        $dados = [];
        //$us=new Users();
        $u=new Usermail();
        $recupera = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        if (in_array('', $dados)) {
            $dados['retorno'] = Alert::AjaxWarning("Por favor preencha todos os campos!!");
        } elseif (!Check::isMail($recupera['email_us'])) {
            $dados['retorno'] = Alert::AjaxDanger("O email informado não tem um formato válido!!");

        }elseif (isset($recupera['email_us']) && !empty($recupera['email_us'])){

                $recupera['Assunto']='Mensagem via Site!';
                $recupera['mensagem']='Por favor não responda esse email.Este email é apenas recuperar os dados do usuário.!';
                $recupera['DestinoNome']='Francisco Carlos - IZfriggi';
                $recupera['DestinoEmail']='contazf@institutozfriggi.com.br';

           $res =$u->setToken($recupera);
              if ($res == '1') {

                  $u->setMailRec();
                  $u->Config();

                  $enviar = $u->sendMailRec();
                   if($enviar == '1'){
                       $dados['retorno'] = Alert::AjaxWarning("Uma mensagem foi enviada pra sua conta de email.");
                       $dados['retorno'] = Alert::AjaxWarning("Por favor, use o link para redefinir sua senha!!");

                   }else{

                       $dados['retorno'] = Alert::AjaxDanger('erro');
                   }
              } else {

                $dados['retorno'] = Alert::AjaxWarning("erro!!");
                }





//              }elseif( $us->setToken($recupera)) {

//            if ($res == '1') {
//                $dados['retorno'] = Alert::AjaxSuccess("token cadastrado com sucesso!!");
//                //                $mail =new Email(); $mail->setMailRec();$mail->Config(); $mail->sendMailRec();
//            } else {
//                $dados['retorno'] = Alert::AjaxWarning("erro!!");
//            }

        }
        echo json_encode($dados);
        exit;
    }

    public function recSenha()
    {
        $dados = [];

        $this->loadView("login/getSenha", $dados);
    }

    public function newSenha()
    {
        $dados = [];

        $dados_form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        $user =new Users();

        if (in_array('', $dados_form)) {
            $dados['retorno'] = Alert::AjaxWarning("Por favor preencha todos os campos!!");
        } elseif (isset($dados_form['pass_us']) && (strlen($dados_form['pass_us']) < 6 || strlen($dados_form['pass_us']) >= 9)){
            $dados['retorno'] = Alert::AjaxWarning("A senha deve ter entre 6 e 8 caracteres!!");
            }elseif ($user->LoginCreate($dados_form)){
            $dados['retorno'] = Alert::AjaxSuccess("Parabéns cadastro realizado com sucesso!!");
        }
        echo json_encode($dados);
        exit;
    }

    public function recupera(){

    }






    public function logout() {
        $u = new Users();
        $u->logout();
        header("Location: ".BASEADMIN);
    }


}