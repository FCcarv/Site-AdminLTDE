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

        $dados['user_add_permission'] = $u->existPermissao('users_add');
        $dados['user_edit_permission'] = $u->existPermissao('users_edit');
        $dados['user_view_permission'] = $u->existPermissao('users_view');
        $dados['user_del_permission'] = $u->existPermissao('users_delet');
        if ($u->existPermissao('users_view')) {
            $dados['users_list'] = $u->getListUsers($u->getId());

            $this->loadTemplate('login/users', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*Chama a view  para adicionar usuarios de modo restrito*/
    public function add()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        $dados['id_user'] = $u->getId();

        if ($u->existPermissao('users_add')) {
            $permite = new Permissao();
            $dados['grup_List'] = $permite->getGrupList();

            $this->loadTemplate('login/users_Add', $dados);
        }else{
            header("Location: " . BASEADMIN);
        }
    }
    /*Adicionar usuarios no sistema dentro do painel*/
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

/*chama a view dee dição dos usuarios no painel em area restrita*/
    public function editUS($id_us) {
        $dados = [];
        $u = new Users();
        $permite = new Permissao();
        $dados['id_user'] = $u->getId();

        $dados['user_info'] = $u->getUserInfo($id_us);//retorna informações do usuario
        $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

        $this->loadTemplate('login/users_Edit', $dados);
    }

/*Edita as informações do usuario na area restrita do admin*/
    public function edit()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('users_edit')) {
            $dados = [];

            $dadosPerm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $id_us = $dadosPerm['id_us'];

            $dadoUs = $u->update($dadosPerm,$id_us);
            if ($dadoUs == true) {
                $dados['retorno'] = Alert::AjaxSuccess("<b>Usuário editado com sucesso!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("users");
            } else {
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao atualizar Usuário!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("users");
            }
        }else{
          $dados['redirect'] = Alert::AjaxRedirect(BASEADMIN."home");
        }
        echo json_encode($dados);
        exit;
    }

/*Chama a view de atualização de fotos do painel admin*/
    public function Ftos($id_us)
    {
        $dados = [];
        $u = new Users();
        $permite = new Permissao();
        $dados['id_user'] = $u->getId();

        $dados['user_info'] = $u->getUserInfo($id_us);//retorna informações do usuario
        $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

        $this->loadTemplate('login/users_Edit', $dados);
    }

/*Edita e atualiza as fotos do usuario no painel admin*/
    public function editFotos()
    {
        $dados = [];
        $u = new Users();
        $us = new UserRepository();
        $u->setLogUser();

            $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

            $dadosPerm['ftos_us'] = (!empty($_FILES['ftos_us']["name"]) ? $_FILES['ftos_us'] : NULL);
           // var_dump($dadosPerm);die;
            $ftUpdate = $us->updateFto($dadosPerm);
            if ($ftUpdate !== true) {

                $dados['retorno'] = Alert::AjaxSuccess("<b>Foto atualizada com sucesso!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("users/editUs/{$dadosPerm['id_us']}");

            } else {

                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao atualizar Foto de Perfil!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("users/editUs/{$dadosPerm['id_us']}");
            }

        $us->return_ajax_error($dados);
    }
    /*Deleta usuarios */
    public function delete($id_us) {

        $dados = [];
        $u = new Users();
        $u->setLogUser();
        $dados['id_user'] = $u->getId();

        if ($u->existPermissao('users_delet')) {
            $permite = new Permissao();
            $dados['user_info'] = $u->getUserInfo($id_us);//retorna informações do usuario
            $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

            $u->delete($id_us);
            header("Location: ".BASEADMIN."users");
        }else{
            header("Location: " . BASEADMIN);
        }
    }

/*chama a view de atualização dos dados  do usuario*/
    public function pefilUser($id_us)
    {
        $dados = [];
        $u = new Users();
        $permite = new Permissao();
        $dados['id_user'] = $u->getId();

        $dados['infoUS'] = $u->selectID($id_us);//retorna informações do usuario
        $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

    //print_r($dados['id_user']);        exit;
        $this->loadTemplate('login/perfil', $dados);
   }
/*atualiza informações do usuario na view perfil*/
    public function pefilEdit()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('users_perfil')) {
            $dados = [];

            $dadosPerm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $id_us = $dadosPerm['id_us'];

            $dadoUs = $u->update($dadosPerm,$id_us);
            if ($dadoUs == true) {
                $dados['retorno'] = Alert::AjaxSuccess("<b>Usuário editado com sucesso!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("home");
            } else {
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao atualizar Usuário!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("home");
            }
        }else{
            $dados['redirect'] = Alert::AjaxRedirect(BASEADMIN."home");
        }
        echo json_encode($dados);
        exit;
    }

/*Edita as fotos na area de perfil do usuario, fora do painel*/
/*    public function editFotosPerfil()
    {
        $dados = [];
        $u = new Users();
        $us = new UserRepository();
        $u->setLogUser();

        if ($u->existPermissao('users_perfil')) {
            $dadosPerm = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

                if (isset($dadosPerm['id_us']) && !empty($dadosPerm['id_us'])) {
                    $id_us = $dadosPerm['id_us'];
                    if (isset($_FILES['ftos_us']) && !empty($_FILES['ftos_us'])) {
                        $ftos_us = $_FILES['ftos_us'];

                    } else {
                        $ftos_us = array();
                    }
                    $ft = $us->updateFto($ftos_us, $id_us);
                    die;

                    /*      if ($ft == true) {
                              $dados['retorno'] = Alert::AjaxSuccess("<b>Foto atualizada com sucesso!!!</b>");
                              $dados['redirect'] = Alert::AjaxRedirect("users");
                          } else {
                              $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao atualizar Foto de Perfil!!</b>");
                              $dados['redirect'] = Alert::AjaxRedirect("users");
                          }
                }
            } else {
                $dados['redirect'] = Alert::AjaxRedirect(BASEADMIN . "users");
            }
            echo json_encode($dados);
            exit;
        }*/

/*Chama a view de usuario da area de perfil fora do painel*/
    public function FtosPerfil($id_us)
    {
        $dados = [];
        $u = new Users();
        $permite = new Permissao();
        $dados['id_user'] = $u->getId();

        $dados['infoUS'] = $u->selectIDses($id_us);//retorna informações do usuario
        $dados['grup_List'] = $permite->getGrupList();//retorna informações do Grupo de Permissao

        $this->loadTemplate('login/perfil', $dados);
    }

}



