<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 07/10/18
 * Time: 07:51
 * Controller responsável pela gestão das informações do layout de banner de enpresas
 */

class empresaController extends Controller
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
//FAz a paginação das empresas cadastradas e uma seleçao das empresas
    public function index()
    {
        $dados = [];
        $u = new Users();
        $emp = new EmprPost();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {
            $offset= 0;
            $limit =8;
            $totalPgs = $emp->totalEmpr();//total de paginas

            $dados['pgs']= ceil($totalPgs/$limit);//paginas

            $dados['pagAtual'] = 1;
            if(!empty($_GET['p'])) {
                $dados['pagAtual'] = intval($_GET['p']);
            }


            $offset = ($dados['pagAtual'] * $limit) - $limit;
            $dados['getEmpresa'] = $emp->getEmpr($offset, $limit);

            $this->loadTemplate('empresas/empresaList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*Busda a view de cadastro de empresas
e manda as informações do banco pra view*/

    public function EmpCad()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {


            $this->loadTemplate('empresas/empresaCad', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*ezecuta o cadastro das empresas*/
    public function addEmpr()
    {
        $dados = [];
        $u = new Users();
        $empRp= new EmprRepository();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {
            $FormEmpr = filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);

            $CdEmp = $empRp->addEmprCreate($FormEmpr);

            if(isset($CdEmp) &&  $CdEmp == true){
                $dados['retorno'] = Alert::AjaxSuccess("<b>Empresa <ins> {$FormEmpr['marca_emp']} </ins> cadastrada com sucesso!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("empresa");
            }else{
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao cadastrar a empresa</b>");
                $dados['redirect'] = Alert::AjaxRedirect("empresa");
            }
        }
        $empRp->return_ajax_error($dados);
    }
/*Busca a view de atualização das empresas
e manda as informações do banco pra view
*/
    public function EmpEdit($idEmp)
    {
        $dados = [];
        $u = new Users();
        $empRp= new EmprRepository();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {
            $dados['getEmprID'] = $empRp->setEmprID($idEmp);


            $this->loadTemplate('empresas/empresaEdit', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

    public function postExist(){
        $dados = [];
        $emp = new EmprPost();
        $empRp= new EmprRepository();
        $dados_Form = filter_input(INPUT_POST,'post_title',FILTER_DEFAULT);

        if ($emp->setNomeMarcaEmpr($dados_Form) == true) {
            $dados['postExist'] = true;
            $dados['retorno'] = Alert::AjaxInfo("<b> Esse Marca <ins>{$dados_Form}</ins> já existe.
                <p>
                <button class='btn btn-primary manterTitlePost'>Manter</button>
                <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                </p>");
            $empRp->return_ajax_error($dados);
        }
    }
    /*executa a atualização das empresass cadastradas*/
    public function editEmpr()
    {
        $dados = [];
        $u = new Users();
        $empRp= new EmprRepository();
        $u->setLogUser();
        if ($u->existPermissao('empresa_view')) {

             $FormEmpr = filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);

                $editEmpr = $empRp->upEmprPost($FormEmpr);

                if(isset($editEmpr) &&  $editEmpr == true){
                    $dados['retorno'] = Alert::AjaxSuccess("<b>Empresa <ins> {$FormEmpr['marca_emp']} </ins> atualizada com sucesso!</b>");
                    $dados['redirect'] = Alert::AjaxRedirect("empresa");
                }else{
                    $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao cadastrar a empresa</b>");
                    $dados['redirect'] = Alert::AjaxRedirect("empresa");
                }

         }

        $empRp->return_ajax_error($dados);
    }
/*exclui as emppresas cadastradas no sistema via ajax */
    public function excluiEmp()
    {
        $dados = [];
        $u = new Users();
        $empRp= new EmprRepository();
        $emp = new EmprPost();
        $u->setLogUser();
        if (isset($_POST['id'])) {
            $idEmp = $_POST['id'];

            //verifica se tem img na pasta de capa e deleta
            $capa = $emp->setCoverEmpr($idEmp);
            $coverEmpCapa = "../uploads/" . $capa['image_cliente_empresa'];
            if (file_exists($coverEmpCapa) && !is_dir($coverEmpCapa)) {
                unlink($coverEmpCapa);
            }

            //exclui o Album de fotos
            $deletEmp = $emp->ExcluiEmpr($idEmp);
            if ($deletEmp == true) {
                $dados['retorno'] = Alert::AjaxSuccess(true);
                $dados['redirect'] = Alert::AjaxRedirect("empresa");
            }
        } else {
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }
        $empRp->return_ajax_error($dados);
    }

}