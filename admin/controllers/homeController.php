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

        $Hm = new HomePag();
		$u->setLogUser();

		$dados['user_id']    = $u->getId();
		$dados['user_email'] = $u->getEmail();

		//Exibe conteudo na view
		$dados['PostView'] = $Hm->PostsView();
		$dados['PostDest'] = $Hm->PostsDestaques();
		$dados['Message'] = $Hm->getMsgHome();
		$dados['Browsers'] = $Hm->getBrowsers();

        //Qtde visitas do Site por navegador
        $dados['totalViews'] = $Hm->getTotalViewsNav();
        //Qtde Usuarios
		$dados['ViewsUser'] = $Hm->getTotalViewsUser();
		//Qtde visitas do Site
		$dados['ViewsSite'] = $Hm->getTotalViews();
		//Qtde Páginas Visitadas
		$dados['ViewsPage'] = $Hm->getTotalPages();
		//Qtde Posts do Site
		$dados['ViewsPost'] = $Hm->getTotalPosts();



        //usuario logado
        $dados['listUserinfo']  = $u->listUser();


		$this->loadTemplate('home', $dados);
	}

    public function sessionViews()
    {

    }

}
