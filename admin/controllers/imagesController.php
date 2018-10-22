<?php
/**
 * Controller dos models e Views da galeria de Imagens
 * Executa apenas o cadastros e gerenciamento das fotos ou imagens

 Apenas a gestao das imagens ,parte de inserçao  e exclusão etc nas galeria de fotos
 */

class imagesController extends Controller
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
/*Puxa apenas a view que lista as imagens*/
    public function index()
    {
        $dados = [];
        $u = new Users();

        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {

            $this->loadTemplate('images/listImages', $dados);

        } else {
            header("Location: " . BASEADMIN);
        }
    }
    /*======================================================== Fotos da galeria ====================================================*/
   /*Cadastra fotos a galeria, ao longo do
   desenvolcin=mento falop em galerias de fotos ou albuns
   Tem a funçã de mandar as informações pra view e puxar a view para o controller
    * */
     public function addFotosG()
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {

            $dados['selectGallery'] = $gal->selectGalFotos();
            $this->loadTemplate('images/addImages', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*Faz o cadastramento propriamente dito , ezecutando o create.*/
    public function addFts()
    {
        $dados = [];
        $gal = new GalPost();
        $galRp = new GallRepository();
        $FormImage = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        $g = $gal->listAlbuns();
        foreach($g as $valor);
            $insertFts = $galRp->createImages($FormImage, $valor['id_fto_albuns'], $valor['title_fto_albuns'] );
            if ($insertFts == true) {
                $dados['retorno'] = Alert::AjaxSuccess("<b>As imagens foram cadastradas no Álbum <ins>{$FormImage['title_image']}</ins> com sucesso!!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("galImages/" );
            } else {
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro ao cadastrar imagens!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("galImages/");
            }

      $galRp->return_ajax_error($dados);
    }
/*Busca as imagens e lista  para a paginação das imagens na view
 */
    public function editFotosG($id_fto_abum)
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {
            $dados ['getGAL'] = $gal->selectGalFotsID($id_fto_abum);

            $offset =0;
            $limit = 10;
            $dados['buscIDfto'] = $gal->buscaId_gal($id_fto_abum);
            $dados['buscIDfto']  = ( !empty($dados['buscIDfto']) ) ?  $dados['buscIDfto'] : null;

            $totalPgs = $gal->totalFotos($id_fto_abum);//total de paginas
            $dados['pgs']= ceil($totalPgs/$limit);//paginas

            $dados['pagAtual'] = 1;
            if(!empty($_GET['p'])) {
                $dados['pagAtual'] = intval($_GET['p']);
            }
            $offset = ($dados['pagAtual'] * $limit) - $limit;
            $dados ['getImage'] = $gal->selectImgID($id_fto_abum, $offset, $limit);
            $this->loadTemplate('images/listImages', $dados);
        }else{
            header("Location: " . BASEADMIN);
            die();
        }
    }
/*Deleta as imagens via ajax*/
    public function delFotosG(){
        $dados = [];
        $u = new Users();
        $galRp = new GallRepository();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {
            if(isset($_POST['id'])){
                $idFt = $_POST['id'];
                $dFt = $galRp->deleteFt($idFt);
                    if ($dFt == true){
                        $dados['retorno'] = Alert::AjaxSuccess(true);
                        $dados['redirect'] = Alert::AjaxRedirect("listImages");
                    }
                }
        }else{
          $dados['redirect'] = Alert::AjaxRedirect("home");
        }
        $galRp->return_ajax_error($dados);
    }

}