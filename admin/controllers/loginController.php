<?php

class loginController extends Controller {
	//PUXA A VIEW LOGIN
	public function index() {
		$dados      = [];
		$dados_form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
		if (isset($_COOKIE['userCookie']) && !empty($_COOKIE['userCookie'])) {
			$cookie                 = $_COOKIE['userCookie'];
			$cookie                 = explode('&', $cookie);
			$dados_form['email_us'] = base64_decode($cookie[0]);
			$dados_form['pass_us']  = base64_decode($cookie[1]);
			$dados_form['remenber'] = 1;

			$dados = array(
				"email_us" => $dados_form['email_us'],
				"pass_us"  => $dados_form['pass_us'],
				"remenber" => $dados_form['remenber'],
			);
		}
		$this->loadView("login/login", $dados);

	}
	//REDIRECIONA A VIEW CADASTRO
	public function cadastra() {
		$dados = [];

		$this->loadView("login/cadastrar", $dados);
	}

	//METODO COM FINALIDADE DE LOGAR NO SISTEMA
	public function log() {
		$dados      = [];
		$user       = new Users();
		$dados_form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

		if (!in_array('', $dados_form)) {
			if (Check::isMail($dados_form['email_us'])) {
				$log = $user->login($dados_form);
				if ($log == true) {
					$dados['retorno']  = Alert::AjaxSuccess("<b>Login efetuado com sucesso.<br/> Você será redirecionado...</b>");
					$dados['redirect'] = Alert::AjaxRedirect("home");
				} else {
					$dados['retorno'] = Alert::AjaxDanger("Senha incorreta!!");
				}
			} else {
				$dados['retorno'] = Alert::AjaxDanger("O <b>email</b> informado não tem um formato válido!!");
			}
		} else {
			$dados['retorno'] = Alert::AjaxWarning("<b>Por favor preencha todos os campos!!</b>");
		}
		echo json_encode($dados);
		exit;
	}

	//ADICIONA USUARIO A LISTA DE USUÁRIOS DO SISTEMA
	public function add() {
		$dados      = [];
		$dados_form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
		$user       = new Users();

		if (in_array('', $dados_form)) {
			$dados['retorno'] = Alert::AjaxWarning("<b>Por favor preencha todos os campos!!</b>");
		} elseif (!Check::isMail($dados_form['email_us'])) {
			$dados['retorno'] = Alert::AjaxWarning("<b>O email informado não tem um formato válido!!</b>");
		} elseif (isset($dados_form['pass_us']) && (strlen($dados_form['pass_us']) < 6 || strlen($dados_form['pass_us']) >= 9)) {
			$dados['retorno'] = Alert::AjaxWarning("<b>A senha deve ter entre 6 e 8 caracteres!!</b>");
		} elseif ($user->LoginCreate($dados_form)) {
			$dados['retorno'] = Alert::AjaxSuccess("<b>Parabéns cadastro realizado com sucesso!!</b>");
		}
		echo json_encode($dados);
		exit;
	}

	//BUSCA A VIEW  DE EMAIL, NA PARTE DE ESQUECI SENHA
	public function key() {
		$dados = [];
		$this->loadView("login/esqSenha", $dados);
	}

	/*
	 * METODO RESPONSAVEL EM ORGANIZAR E MANIPULAR AS INFORMAÇÃOES DO USUARIO ,
	 * PARTIDO DESDE  DA ENTRADA DO EMAIL DO USUARIO QUE ESQUECEU SUA SENHA ATÉ
	 * A CRIAAÇÃO DO TOKEN  E O ENVIO DO MESMO PARA O EMAIL DO USUARIO.
	 * */
	public function esqueciSenha() {
		$dados    = [];
		$u        = new Usermail();
		$recupera = [];

		$fieldEmail = filter_input(INPUT_POST, 'email_us', FILTER_DEFAULT);

		if (isset($fieldEmail) && !empty($fieldEmail)) {
			if (Check::isMail($fieldEmail)) {

				$recupera['Assunto']       = 'Mensagem via Site!';
				$recupera['mensagem']      = 'Por favor não responda esse email.Este email é apenas para recuperar os dados do usuário.!';
				$recupera['DestinoNome']   = 'ADMINISTRA - IZfriggi';
				$recupera['DestinoEmail']  = 'contazf@institutozfriggi.com.br';
				$recupera['RecuperaEmail'] = $fieldEmail;

				$res = $u->setToken($fieldEmail);
				if ($res) {

					$email = new Email();
					$email->setMailRec($recupera);
					$email->getMensagem($u->setMsgRec());

					$enviar = $email->enviar();
					if ($enviar == true) {
						$dados['retorno'] = Alert::AjaxSuccess("<b>Uma mensagem foi enviada pra sua conta de email.<br />Por favor, use o link para redefinir sua senha!!</b>");
					} else {
						$dados['retorno'] = Alert::AjaxWarning("<b>Não foi possivel enviar o Token!</b>");
					}
				} else {
					$dados['retorno'] = Alert::AjaxWarning("<b>Não foi possivel encontrar e/ou gerar o token!</b>");
				}
			} else {
				$dados['retorno'] = Alert::AjaxDanger("<b>O email informado não tem um formato válido!!</b>");
			}
		} else {
			$dados['retorno'] = Alert::AjaxWarning("<b>Por favor preencha todos os campos!!</b>");
		}
		echo json_encode($dados);
		exit;
	}

	/*JA COM O TOKEN CRIADO  E ENVIADO AO EMAIL DO USUARIO,
	 *ESSE METODO TEM POR RESPONSABILIDADE EM VALIDAR  A NOVA SENHA E
	 * E ATUALIZA LA APOS O CLICK DO USUARIO NO LINK ENVIADO AO SEU EMAIL.
	 * */
	public function newSenha() {
		$dados = [];
		$user  = new Usermail();

		$dados_form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		if (!in_array('', $dados_form)) {
			if (strlen($dados_form['pass_us']) >= 6 && strlen($dados_form['pass_us']) <= 8) {

				$update_senha = $user->updateSenha($dados_form['id_user'], $dados_form['pass_us']);
				$update_token = $user->updateStatusToken($dados_form['token']);

				if ($update_senha && $update_token) {
					$dados['retorno']  = Alert::AjaxSuccess("<b>Parabéns, senha atualizada com sucesso!!</b>");
					$dados['redirect'] = Alert::AjaxRedirect('login');
				} else {
					$dados['retorno'] = Alert::AjaxWarning("<b>Impossivel redefinir senha!</b>");
				}
			} else {
				$dados['retorno'] = Alert::AjaxWarning("<b>A senha deve ter entre 6 e 8 caracteres!!</b>");
			}
		} else {
			$dados['retorno'] = Alert::AjaxWarning("<b>Por favor preencha ocampo da nova senha!</b>");
		}

		echo json_encode($dados);
		exit;
	}
	/*eESSE METODO FUNCIONA APOS O CLICK DO USUARIO NO LINK ENVIADO PARA O SEU IMAIL.
	 * TEM A RESPONSABILIDADE DE RECUPERAR O TOKEN ENVIADO VIA LINK DO EMAIL DO USUARIO
	 * E CASO DER ERRO A PESSOA SERA REDIRECIONADA PARA UMA NOVA APROVAÇÃO DE SENHA.
	 * */
	public function recuperar($token) {
		$dados = [];

		$user    = new Usermail();
		$id_user = $user->redefinirSenha($token);

		$dados['id_user'] = $id_user;
		$dados['token']   = $token;

		if ($id_user) {
			$this->loadView("login/getSenha", $dados);
		} else {
			$dados = [
				'alerta'  => 'alert-danger',
				'titulo'  => 'Erro de Token',
				'retorno' => 'Desculpe, mas o token não existe ou já expirou!
                    <p>Gere outro token e o ative assim que possivel!</p>
                    <h3>
                    <a style="text-decoration:none" href="'.BASEADMIN.'/login/key">Gerar novo Token</a>
                    </h3>'
			];

			$this->loadView('login/token_invalido', $dados);
		}
	}

	/*Deslogar do sistema */
	public function logout() {
		$u = new Users();
		$u->logout();
		header("Location: ".BASEADMIN);
	}
}