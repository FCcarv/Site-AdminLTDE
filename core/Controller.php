<?php

class Controller {

    public function __construct() {

    }

    public function __call($name, $arguments) {
        $this->loadTemplate('error_404');
    }

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        include 'views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = array()) {

        /*$user= new Users;
        $dadosUser = $user->selectID($_SESSION['userlogin']['id_user']);
        extract($dadosUser);*/

       include 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData) {
        extract($viewData);
        include 'views/' . $viewName . '.php';
    }

}
