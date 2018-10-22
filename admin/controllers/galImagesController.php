<?php
/**
 * Controller dos models e Views da galeria de Imagens
 * Apenas a gestão das galerias, foto de capa etc.
 */

class galImagesController extends Controller
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
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {
            $dados['listGalFt'] = $gal->getGallery();
            $this->loadTemplate('galeria/galleryFtsList', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }

/*Puxa a view e de cadastro das galerias*/
    public function galFtadd()
    {
        $dados = [];
        $u = new Users();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {

            $this->loadTemplate('galeria/galleryFtsCadd', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }//

    /*adiciona e cadastra  as galerias de fotos*/
    public function addgal()
    {
        $dados = [];
        $u = new Users();
        $galRp = new GallRepository();

        $u->setLogUser();

        $FormGallery = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        $addG = $galRp->addGalImage($FormGallery);
        if ($addG == true) {
            $dados['retorno'] = Alert::AjaxSuccess("<b>Galeria  <ins> {$FormGallery['title_galft']} </ins> Cadastrada com sucesso!!</b>");
            $dados['redirect'] = Alert::AjaxRedirect("galImages");
        }
        $galRp->return_ajax_error($dados);
        exit();
    }

    /*Edita as galerias de imagens, enviando os dados e puxando  a view praa o controle*/
    public function galFtEdit($id_gal)
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {

            $dados['getDadosGal'] = $gal->getIDGal($id_gal);
            $this->loadTemplate('galeria/galleryFtsEdit', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }//

/*atualiza as galerias de fotos e a parte de status das mesmas*/
    public function editgal()
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $galRp = new GallRepository();
        $u->setLogUser();

        $FormGallery = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);

        $GalFts_up = $galRp->upGalImage($FormGallery);
        $GalFtsStatus = $gal->setStatusGal($FormGallery['id_galft']);

        if (isset($GalFts_up) && $GalFts_up == true) {
            if (($GalFts_up == true) && $GalFtsStatus === false) {
                $dados['retorno'] = Alert::AjaxSuccess("<b>O álbum <ins>{$FormGallery['title_galft']}</ins> foi atualizado como rascunho!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("galImages");
            } else {
                $dados['retorno'] = Alert::AjaxSuccess("<b>O álbum <ins>{$FormGallery['title_galft']}</ins> foi atualizado e publicado no site!</b>");
                $dados['redirect'] = Alert::AjaxRedirect("galImages");
            }
        } else {
            $dados['retorno'] = Alert::AjaxDanger("<b>Erro o álbum <ins>{$FormGallery['title_galft']}</ins> não foi atualizado</b>");
            $dados['redirect'] = Alert::AjaxRedirect("galImages");
        }
        $galRp->return_ajax_error($dados);
    }

    /*Exclui as galerias de imagens verificando se as fotos  nos  ditetorios*/
    public function galFtDel()
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $galRp = new GallRepository();
        $u->setLogUser();

        if (isset($_POST['id'])) {
            $idGalf = $_POST['id'];

            //verifica se tem img na pasta de capa e deleta
            $capa = $gal->setCoverGalFt($idGalf);
            $coverGalCapa = "../uploads/" . $capa['cover_fto_albuns'];
            if (file_exists($coverGalCapa) && !is_dir($coverGalCapa)) {
                unlink($coverGalCapa);
            }

            //exclui o Album de fotos
            $deletGalFt = $gal->ExcluiGalFt($idGalf);
            if ($deletGalFt == true) {
                $dados['retorno'] = Alert::AjaxSuccess(true);
                $dados['redirect'] = Alert::AjaxRedirect("galImages");
            }

        } else {
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }
        $galRp->return_ajax_error($dados);
    }
    /*####################### teste ###########################*/

    public function addGalftTeste()
    {
        $dados = [];
        $u = new Users();
        //$gal = new GalPost();
        $u->setLogUser();
        if ($u->existPermissao('galleryFts_view')) {

          // $dados['getDadosGal'] = $gal->getIDGal();

            $this->loadTemplate('galeria/galTest', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }//

    public function formGalTeste()
    {
        $dados = [];
        $u = new Users();
        $gal = new GalPost();
        $galRp = new GallRepository();
        $u->setLogUser();

        $rowCout= 0;
        if($rowCout > 0){
            $dados['postExist']= true;
        }else{
            $dados['postExist']= false;
        }

        $galRp->return_ajax_error($dados);
    }//
}
