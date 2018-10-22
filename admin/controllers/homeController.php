<?php
class homeController extends Controller {

	public function __construct() {

		parent::__construct();
		$u = new Users();

		if ($u->islogado() == false) {
			header("Location: ".BASEADMIN."login");
			exit;
		}
	}

	public function index() {
		$dados = [];
		$u     = new Users();
		$u->setLogUser();

		$dados['user_id']    = $u->getId();
		$dados['user_email'] = $u->getEmail();

		$this->loadTemplate('home', $dados);
	}

}
