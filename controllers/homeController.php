<?php

class homeController extends Controller {

    public function index()
    {
        $homepags = new HomePag();
        $ses = new Session();

        $dados = [];
        $dados['session']  = $ses;
        $dados['editores'] = $homepags->editor_list();
        $dados['PostFront'] = $homepags->PostsFront();
        $dados['galeriasFt'] = $homepags->GalleryFts();
        $dados['allVideos'] = $homepags->VideosFront();
        $dados['allEmpresas'] = $homepags->company();
        $dados['allMsg'] = $homepags->Msgs();

        $this->loadTemplate('home', $dados);
    }


    public function fts($slugft)
    {
        $homepags = new HomePag();
        //$gal = new GalPost();

        $dados = [];

        $dados['gallSlug']  = $homepags->selectGalFotsSlug($slugft);
        $idFt = $dados['gallSlug'][0]['id_fto_albuns'];
        $dados['FtsGallery']  = $homepags->ImgGftID($idFt);



        $this->loadTemplate('gallery/viewFtos', $dados);
    }


    public function jornal()
    {
        $jorn = new JornalPost();

        $dados = [];

        $dados['allJornal']  = $jorn->allgetJornal();
        $this->loadTemplate('jornal/viewsEdicao', $dados);
    }

    public function noticias($slugPg)
    {
        $homepags = new HomePag();

        $dados = [];

        $dados['Artigos']  = $homepags->postsPag($slugPg);

        $this->loadTemplate('news/pagPost', $dados);
    }
}
