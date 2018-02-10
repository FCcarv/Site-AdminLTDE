<?php
class loginController extends Controller{
    
    
    public function index() {
        $dados = [];

        
        $this->loadView("login/login", $dados);
    }
    
    
    public function cadastra() {
        $dados = [];

        
      $this->loadView("login/cadastra", $dados);
    }
    
     public function add(){
        $dados = [];
                                   //0                     1           2                    3
        //$dados['retorno'] = ['alert alert-danger', 'fa fa-info','Opa esse é o Titulo','Deu Certo'];
        $dados['retorno'] = Alert::AjaxInfo("Senha com 6 a 8 digitos","Presta atenção");
        
      echo json_encode($dados);
      exit;
    }
}
