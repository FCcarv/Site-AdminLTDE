<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 11/10/18
 * Time: 14:07
 *
 * Controller responsavel pela gestao de galeiras de video
 */

class GallRepository extends GalPost
{
    /*
     * Pega a url do video e seleciona pelo id identificando se é video do youtube
     *E envia os dados para cadastro no banco
    */
    public function setVideotube($urlVideo)
    {
        $strg   = 'v=';
        $youtb = '/' . $strg . '/';//verifica a ocorrencia "v=" na string
        if (preg_match($youtb, $urlVideo)) {
            $url = strip_tags(trim($urlVideo));
            if (substr_count($url, 'youtube') == 1) {
                $idVideo = substr(strstr($url, "v="), +2);//pega depois da letra v=
                $idVid = ((strlen($idVideo) > 11) ? substr($idVideo, 0, 11) : $idVideo);//verifica se existe caracteres a mais e corta a url deixando somente 11 caracteres.
                $thumb = 'http://i1.ytimg.com/vi/' . $idVid . '/default.jpg';
                $resUrl = strstr($url, "v=", true);//pega antes da v=
                $fullUrl = $resUrl . 'v=' . $idVideo;//aki junta tudo
                $conteudoVideo = get_meta_tags($fullUrl);
                $titleVideo = (!empty($conteudoVideo['title']) ? $conteudoVideo['title'] : null);
                $DescVideo = (!empty($conteudoVideo['description']) ? $conteudoVideo['description'] : null);

                $dadosVdTube = [
                    "titulo_video" => $titleVideo,
                    "descricao_video" => $DescVideo,
                    "thumb_video" => $thumb,
                    "embed_video" => $idVid
                ];
                return $this->InsertVideo($dadosVdTube);
            }
        } else {
             $this->dados['retorno'] = Alert::AjaxDanger("<b>Não é possível adicionar a playlist de vídeos.</br>
                                                            Vídeo não foi adicionado direto do YOU TUBE</b>");
            $this->dados['redirect'] = Alert::AjaxRedirect("gallery/addGalVid");
            $this->return_ajax_error($this->dados);
        }
    }

    /*
    * Pega a url do video e seleciona pelo id identificando se é video do vimeo
    *E envia os dados para cadastro no banco
   */
    public function setVideoVimeo($urlVideo)
    {
        if(substr_count($urlVideo, 'vimeo') == 1) {
        $url_img = parse_url($urlVideo);
        $conteudoVideo = unserialize(file_get_contents("https://vimeo.com/api/v2/video/" . substr($url_img['path'], 1) . ".php"));
        $thumbVideo    = $conteudoVideo[0]['thumbnail_small'];
        $titleVideo    = $conteudoVideo[0]['title'];
        $DescVideo     = $conteudoVideo[0]['description'];
        $idVideo       = $conteudoVideo[0]['id'];

            $dadosVdVimeo=[

                            "titulo_video"       =>  $titleVideo,
                            "descricao_video"    =>  $DescVideo,
                            "thumb_video"        =>  $thumbVideo,
                            "embed_video"        =>  $idVideo
                        ];

            return $this->InsertVideo($dadosVdVimeo);
         }
    }
    //Cadasstra a galetia de fotos  ou álbum e todas as informaçoes do formulario
    public function addGalImage($FormGallery)
    {
        $this->titleImg_exists($FormGallery);
        $FormGallery['img_galft'] = (!empty($_FILES['img_galft']['name']) ? $_FILES['img_galft'] : null);

      if($FormGallery['img_galft'] != null || !empty($_FILES['img_galft']['name'])) {
          //upload da cappa
          $Upload = new Upload('../uploads/');
          $Upload->Image($FormGallery['img_galft'], Check::Name($FormGallery['title_galft']), 1600, 'gallery');
          $FormGallery['img_galft'] = $Upload->getResult();
        }
        $FormGallery['slug_galft'] = Check::Name($FormGallery['title_galft']);
        return $this->insertGalleryFts($FormGallery);
    }

    /*Atualiza as galerias de fotos ou albuns, enviando as imagens para cadastro no banco do dados*/
    public function upGalImage($FormGallery)
    {
       // $this->titleImg_exists($FormGallery['title_galft']);
        $FormGallery['img_galft']   = (!empty($_FILES['img_galft']['name']) ? $_FILES['img_galft'] : NULL);
        $FormGallery['slug_galft'] = Check::Name($FormGallery['title_galft']);

        //verifica se o usuario quer mater ou não o mesmo titulo
        if($FormGallery['title_exist'] == '0') {
            $this->coverSendGalFt($FormGallery);//
        }else{
            $this->dados['retorno'] = Alert::AjaxInfo("<b>Esse Titulo <ins>{$FormGallery['title_galft']}</ins> já existe.
                <p>
                <button class='btn btn-primary manterTitlePost'>Manter</button>
                <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                </p>");
            $this->return_ajax_error($this->dados);
        }
        return true;
    }

/*======================================================  IMAGENS =================================================*/

    //Cadastra as imagen na galeria ou álbum de fotos
    public function createImages($FormImage, $id_fto,$title_fto)
    {
        $FormImage['cover_image'] = (!empty($_FILES['cover_image']) ? $_FILES['cover_image'] : NULL);
        if(($FormImage['cover_image'] !== NULL ) || !empty($FormImage['cover_image']['name'])){
            $FormImage['id_fto_albuns'] = ($FormImage['album_image'] == $id_fto) ? $id_fto : $FormImage['album_image'];

            return $this->addImagesG($FormImage);
        }

    }
    /*Ajuda na exclusão das imagens das galerias via ajax, no banco e nas pastas*/
    public function deleteFt($idFt)
    {
        //ve se tem imgs no banco e apaga nos diretorios
        $selectFt = $this->selectFtID($idFt);
        if(!empty($selectFt)){
            $Ft = "../uploads/{$selectFt['cover_foto']}";
            if (file_exists($Ft) && !is_dir($Ft)) {
                unlink($Ft);
            }
        }
        //envia para excluir o caminho no banco
        return $this->excluiFt($idFt);
    }
    //retorna resposta do ajax
    public function return_ajax_error($data)
    {
        echo json_encode($data);
        exit();
    }

    /*####################   Privates #########################*/

    //Faz o upload das fotos, e cadastra no banco
    private function addImagesG($dados_Form)
    {
        $dados = [];
        $slug_post = Check::Name($dados_Form['title_image']);

            if (empty($Upload)):
                $Upload = new Upload('../uploads/');
            endif;
            $File = $dados_Form['cover_image'];
            $gbFiles = array();
            $gbCount = count($File['type']);
            $gbKeys = array_keys($File);
            $gbLoop = 0;

            for ($gb = 0; $gb < $gbCount; $gb++):
                foreach ($gbKeys as $Keys):
                    $gbFiles[$gb][$Keys] = $File[$Keys][$gb];
                endforeach;
            endfor;

            $dados['gallery'] = null;
            foreach ($gbFiles as $UploadFile):
                $gbLoop++;
                $Upload->Image($UploadFile, "{$slug_post}-{$gbLoop}-" . time() . base64_encode(time()), 800, 'fotos');
                if ($Upload->getResult()):
                    $gbCreate = ['id_fto_albuns' => $dados_Form['id_fto_albuns'], "cover_foto" => $Upload->getResult()];
                    $Create = $this->addImagesGal($gbCreate);
                    $dados['gallery'] .= "<img id='{$Create}' alt='Imagem em {$dados_Form['title_image']}' title='Imagem em {$dados_Form['title_image']}' src='../uploads/{$Upload->getResult()}'/>";
                endif;
            endforeach;
        return true;
    }
    /*envia uma nova capa pra galeria apagando a antiga*/
    private function coverSendGalFt(array $FormGallery)
    {
        $idGal = $FormGallery['id_galft'];

        //reenvio da capa do post
        if (is_array($FormGallery['img_galft'])) {
            $capa = $this->setCoverGalFt($idGal);
            $coverGalFt = "../uploads/". $capa['cover_fto_albuns'];

            //exclui a capa antiga
            if (file_exists($coverGalFt) && !is_dir($coverGalFt)) {
                unlink($coverGalFt);
            }
            //faz o upload da nova capa
            $uploadCapa = new Upload('../uploads/');
            $uploadCapa->Image($FormGallery['img_galft'], Check::Name($FormGallery['title_galft']), 600, 'gallery');

            if (isset($uploadCapa) && $uploadCapa->getResult()) {
                $FormGallery['img_galft'] = $uploadCapa->getResult();

                //envia a capa nova para atualizar no banco
                $this->updateGalFts($FormGallery);//
            }
        }else{
            //atualiza os dados sem trocar a capa
            unset($FormGallery['img_galft']);
            $this->updateGalFts($FormGallery);
        }
    }

    private function titleImg_exists($title)
    {
        if ($this->setTitleGal($title) == true) {
            $this->dados['retorno'] = Alert::AjaxDanger("<b>Esse Titulo <ins>{$title}</ins> já existe.");
            $this->return_ajax_error($this->dados);
        }
    }

  }