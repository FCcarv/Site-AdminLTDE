<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 29/11/18
 * Time: 17:51
 */

class GalleryRepository extends Post
{
    //Método de cadastro de fotos da galeria do post
    public function addGalery(array $dados_Form, $postId)
    {
        $dados = [];
        $dados_Form['gall_post'] = (!empty($_FILES['gall_post']) ? $_FILES['gall_post'] : NULL);
        $slug_post = Check::Name($dados_Form['title_post']);

        if (empty($Upload)):
            $Upload = new Upload('../uploads/');
        endif;
        $File = $dados_Form['gall_post'];
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
            $Upload->Image($UploadFile, "{$slug_post}-{$gbLoop}-" . time() . base64_encode(time()), 1600, 'posts_gallery');
            if ($Upload->getResult()):
                $gbCreate = ['id_post' => $postId, "image_gallery" => $Upload->getResult()];
                $Create = $this->addgallery($gbCreate);
                $dados['gallery'] .= "<img id='{$Create}' alt='Imagem em {$dados_Form['title_post']}' title='Imagem em {$dados_Form['title_post']}' src='../uploads/{$Upload->getResult()}'/>";
            endif;
        endforeach;
    }
}