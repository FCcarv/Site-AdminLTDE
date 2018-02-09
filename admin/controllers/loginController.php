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

        $dados['retorno'] = ['alert-info','esse teste nao funciona'];
        
      echo json_encode($dados);
      
    }
}
