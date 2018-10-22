<?php

class entrarController extends Controller {
	//PUXA A VIEW LOGIN
	public function index() {
		$dados = [];
		$this->loadView("login/login", $dados);

	}

}