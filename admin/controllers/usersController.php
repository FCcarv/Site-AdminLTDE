<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 25/02/18
 * Time: 18:19
 */

class usersController extends Controller
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
        $data['id_user'] = $u->getId();

        if ($u->existPermissao('users_view')) {
            $dados['users_list'] = $u->getListUsers($u->getId());

            $this->loadTemplate('login/users', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    /*Adicionar usuarios no sistema*/
    public function add()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        $dados['id_user'] = $u->getId();

        if ($u->existPermissao('users_view')) {
            $permite = new Permissao();
            $dados['grup_List'] = $permite->getGrupList();

            $this->loadTemplate('login/users_Add', $dados);
        }else{
            header("Location: " . BASEADMIN);
        }
    }

    public function insertUser()
    {
        $dados = [];
        $u = new Users();

        $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

        if (!in_array('', $dadosPerm)) {
            //Se todos os campos foram preenchidos vamos continuar
            if (Check::isMail($dadosPerm['email_us'])) {
                //se o email passado é válido então vamos continuar
                if (isset($dadosPerm['pass_us']) && (strlen($dadosPerm['pass_us']) >= 6 && strlen($dadosPerm['pass_us']) <= 8)) {
                    //se a senha estiver com a qtd de caracteres entre 6 e 9 então vamos continuar
                    $nome_us = $dadosPerm['nome_us'];
                    $sobrenome_us = $dadosPerm['sobrenome_us'];
                    $email_us = $dadosPerm['email_us'];
                    $pass_us = $dadosPerm['pass_us'];
                    $grup_us = $dadosPerm['grup_us'];

                    //aqui tentamos inserir os dados
                    $res = $u->add($nome_us, $sobrenome_us, $email_us, $pass_us, $grup_us);
                    //aqui eu não sei o que retorna, mas se for 1 enão o cadastro foi bem sucedido
                    if ($res == '1') {
                        $dados['retorno'] = Alert::AjaxSuccess("Cadastro efetuado com sucesso!!");
                        $dados['redirect'] = Alert::AjaxRedirect("users");
                    } else {
                        $dados['retorno'] = Alert::AjaxWarning("Usuário já existe!!");
                    }

                } else {
                    $dados['retorno'] = Alert::AjaxWarning("A senha deve ter entre 6 e 8 caracteres!!");
                }

            } else {
                $dados['retorno'] = Alert::AjaxDanger("O email informado não tem um formato válido!!");
            }
        } else {
            $dados['retorno'] = Alert::AjaxWarning("Por favor preencha todos os campos!!");
        }

        echo json_encode($dados);
        exit();

    }

    public function edit($id_us)
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        $dados['id_user'] = $u->getId();

        if ($u->existPermissao('users_view')) {
            $permite = new Permissao();

            $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

            if(isset($dadosPerm['grup_us']) && !empty($dadosPerm['grup_us'])) {

                $nome_us        = $dadosPerm['nome_us'];
                $sobrenome_us   = $dadosPerm['sobrenome_us'];
                $pass_us        = $dadosPerm['pass_us'];
                $grup_us        = $dadosPerm['grup_us'];

                $u->edit($nome_us, $sobrenome_us, $pass_us, $grup_us,$id_us);

                header("Location: ".BASEADMIN."users");
            }
            $dados['user_info'] = $u->getUserInfo($id_us);//retorna informações do usuario
            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

            $this->loadTemplate('login/users_Edit', $dados);
        }else{
            header("Location: " . BASEADMIN);
        }
    }


    public function delete($id_us) {

        $dados = [];
        $u = new Users();
        $u->setLogUser();
        $dados['id_user'] = $u->getId();

        if ($u->existPermissao('users_view')) {
            $permite = new Permissao();
            $dados['user_info'] = $u->getUserInfo($id_us);//retorna informações do usuario
            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

            $u->delete($id_us);
            header("Location: ".BASEADMIN."users");
        }else{
            header("Location: " . BASEADMIN);
        }

    }

}



