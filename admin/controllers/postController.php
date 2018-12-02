<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 09/04/18
 * Time: 09:24
 */

class postController extends Controller
{
    private $idPost;

    public function __construct()
    {
        parent::__construct();
        $u = new Users();
        if ($u->isLogado() == false) {
            header("Location: " . BASEADMIN . "login");
            exit;
        }
    }
    /*Puxa a listagem dos posts e realiza a paginação*/
    public function index()
    {
        $dados = [];

        $pt = new Post;
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('posts_view')) {

            //$offset = 0; o inicio
            //ceill funçao que arredonda pra cima
            $dados['listUserinfo']  = $u->listUser();//info do usuario logado
            $nome_user = $dados['listUserinfo']['nome_user'];
            $idGpPerm = $dados['listUserinfo']['id_grup_permissao'];

            $limit = 4; //qtidade de itens por pagina
            $total = $pt->totalItens();//total de paginas

            $dados['pags']= ceil($total/$limit);//paginas

            $dados['paginaAtual'] = 1;
            if(!empty($_GET['p'])) {
                $dados['paginaAtual'] = intval($_GET['p']);
            }

            $offset = ($dados['paginaAtual'] * $limit) - $limit;//nome_user

            $dados['allPost'] =  $pt->Posts($nome_user,$idGpPerm, $offset, $limit);

            //status do post
            $dados['statusPrint'] =  $pt->getStatus();

            $this->loadTemplate('noticia/posts', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
        /*Busca a view de adicionar add posts*/
    public function add()
    {
        $dados = [];
        $permite = new Permissao();
        $c = new Category;
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('posts_add_view')) {
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCat_Subc']  = $c->listCat_Subcategory($nome_user);//categorias e sucategorias
            $dados['grup_List']     = $permite->getGrupList();//grupos e pemissoes de todos usuarios cadastrados no sistema

            $this->loadTemplate('noticia/add_posts', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
    //Cria postagens
    public function createPost()
    {
        $dados = [];
        $u = new Users();

        $dados_Form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);


            $post = new PostRepository();
            $id_post_atual = $post->addPost($dados_Form);

            $gallery = new GalleryRepository();
            $gallery->addGalery($dados_Form, $id_post_atual );

        if(!empty($id_post_atual) || $gallery == true){
            $dados['retorno'] = Alert::AjaxSuccess("<b>Artigos <ins>{$dados_Form['title_post']}</ins> cadastrado com sucesso!</b>");
            $dados['redirect'] = Alert::AjaxRedirect("post");
            }else {
            $post->excluiImgErro($dados_Form['cap_post']);
            $dados['retorno'] = Alert::AjaxDanger("<b>Erro o artigo <ins>{$dados_Form['title_post']}</ins> não foi cadastrado</b>");
            $dados['redirect'] = Alert::AjaxRedirect("post/add");
            }
           $post->return_ajax_error($dados);


    }
    //atualiza os post mandando informações para view e puxando a view up_posts
    public function editPost($id_post)
    {
        $dados = [];
        $permite = new Permissao;
        $c = new Category;
        $u = new Users;
        $p = new Post;

        $u->setLogUser();

        if ($u->existPermissao('posts_edit_view')) {

            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCat_Subc']  = $c->listCat_Subcategory($nome_user);//categorias e sucategorias
            $dados['grup_List']     = $permite->getGrupList();//grupos e pemissoes de todos usuarios cadastrados no sistema
            $dados['PostList']      = $p->getPosts($id_post);// leitura da tabela de  Posts
            $dados['GalleryList']   = $p->ImgGallery($id_post);//  leitura da tabela de imagens do posts

            $this->loadTemplate('noticia/up_posts', $dados);
        } else {
            header("Location: " . BASEADMIN);
        }
    }
/*trabalha junto com o ajax , confirmando se o titulo do post ja existe e verifica se o usuário mantem ou muda*/
    public function postExist(){
        $dados = [];
        $u = new Users;
        $post = new Post();
        $postRp = new PostRepository();


        $dados_Form = filter_input(INPUT_POST,'post_title',FILTER_DEFAULT);
        if ($u->existPermissao('posts_edit_view')) {
            if ($post->setpost($dados_Form) == true) {
                $dados['postExist'] = true;
                $dados['retorno'] = Alert::AjaxInfo("<b>Esse Titulo <ins>{$dados_Form}</ins> já existe.
                    <p>
                    <button class='btn btn-primary manterTitlePost'>Manter</button>
                    <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                    </p>");
                $postRp->return_ajax_error($dados);
            }

        } else {
            header("Location: " . BASEADMIN);
        }
    }
    //Atualiza os post
    public function edit()    {
        $dados = [];
        $u = new Users;

        $dados_Form = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);


            $post = new PostRepository();
            $Post_up = $post->upPosts($dados_Form);
            $postStatus = $post->setStatus($dados_Form['id_post']);

            if(isset($Post_up) && $Post_up == true){
                if(($Post_up == true) && $postStatus === false){
                    $dados['retorno'] = Alert::AjaxSuccess("<b>O artigo <ins>{$dados_Form['title_post']}</ins> foi atualizado como rascunho!</b>");
                    $dados['redirect'] = Alert::AjaxRedirect("post");
                }else {
                    $dados['retorno'] = Alert::AjaxSuccess("<b>O artigo <ins>{$dados_Form['title_post']}</ins> foi atualizado e publicado no site!</b>");
                    $dados['redirect'] = Alert::AjaxRedirect("post");
                }
            }else{
                $dados['retorno'] = Alert::AjaxDanger("<b>Erro o artigo <ins>{$dados_Form['title_post']}</ins> não foi atualizado</b>");
                $dados['redirect'] = Alert::AjaxRedirect("post");
            }
            $post->return_ajax_error($dados);
    }

    /* exclui imagem da galerioa do post
    * que estuverem na pasta e no banco de dados  consecutivamente
    */
    public function excluiGallery()
    {
        $dados = [];

        $p = new Post;
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('posts_edit_view')) {

            if (isset($_POST['id'])){
                $id_gal = $_POST['id'];
                $SelectImg = $p->SelGallery($id_gal);
                if(isset($SelectImg)){
                    $ImgSl = "../uploads/{$SelectImg['image_gallery']}";
                    if (file_exists($ImgSl) && !is_dir($ImgSl)) {
                        unlink($ImgSl);
                    }
                    $delgallery = $p->delGal($id_gal);
                    if ($delgallery == true){
                        $dados['retorno'] = Alert::AjaxSuccess(true);
                        $dados['redirect'] = Alert::AjaxRedirect("up_posts");
                    }
                }
            }

        }else{
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }
        echo json_encode($dados);
        exit();
    }

    public function excluiPost()
    {
        $dados = [];

        $pt = new Post;
        $u = new Users();
        $u->setLogUser();

        if ($u->existPermissao('posts_edit_view')) {
            $c = new Category;
            $dados['listUserinfo']  = $u->listUser();//info do user logado
            $nome_user = $dados['listUserinfo']['nome_user'];//nome user logado
            $dados['listCatg'] = $c->categoria($nome_user);

            if (isset($_POST['id'])){
                $idPt = $_POST['id'];

                //verifica se tem img na pasta de capa e deleta
                $capa = $pt->SelcoverPost($idPt);
                $coverpost = "../uploads/" . $capa['cover_post'];
                if (file_exists($coverpost) && !is_dir($coverpost)) {
                    unlink($coverpost);
                }
                //verifica se tem imgs na pasta da galeria e deleta
                $allImagGal = $pt->SelImgGal($idPt);
                if (!empty($allImagGal)) {
                    foreach ($allImagGal as $imgG):
                        if (file_exists("../uploads/" .$imgG['image_gallery']) && !is_dir("../uploads/" .$imgG['image_gallery'])) {
                            unlink("../uploads/" .$imgG['image_gallery']);
                        }
                    endforeach;
                }
                //exclui o post
                $deletPost = $pt->excluiPost($idPt);

                //exclui a galeria
                $deletGallery= $pt->excluiGallery($idPt);
                if ($deletPost && $deletGallery == true) {
                    $dados['retorno'] = Alert::AjaxSuccess(true);
                    $dados['redirect'] = Alert::AjaxRedirect("post");
                }
            }
        }else{
            $dados['redirect'] = Alert::AjaxRedirect("home");
        }

        $pt->return_ajax_error($dados);
    }

    //Insere imagens dentro do editor TinyMCE e salva na pasta imageTinymce
    public function sendImgTinymce()
    {
        $u = new Users();
        $pst = new PostRepository();
        $u->setLogUser();

        if ($u->existPermissao('posts_edit_view')) {

            $imageFolder = "../imageTinymce/";
            $pst->dirTiny($imageFolder);
            $temp = current($_FILES);

            if (is_uploaded_file($temp['tmp_name'])) {
                  // Sanitize input
                    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
                        header("HTTP/1.1 400 nome inválido.");
                        return;
                    }

                    // Verify extension
                    if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
                        header("HTTP/1.1 400 Invalid extension.");
                        return;
                    }

                    // Accept upload if there was no origin, or if it is an accepted origin
                    $filetowrite = $imageFolder . $temp['name'];

                    move_uploaded_file($temp['tmp_name'], $filetowrite);

                    $url ="http://localhost/Portal-News/imageTinymce/". $temp['name'];

                echo json_encode(array('location' => $url));
            }else{
                // Notify editor that the upload failed
                header("HTTP/1.1 500 Server Error");
            }

        }
    }

}