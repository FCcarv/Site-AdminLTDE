<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 21/10/18
 * Time: 06:48
 */


class EmprRepository extends EmprPost
{
    public function addEmprCreate($FormEmpr)
    {
        $this->title_empr_exists($FormEmpr);
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
    //retorna resposta do ajax
    public function return_ajax_error($data)
    {
        echo json_encode($data);
        exit();
    }
/*#############################################
################### PRIVATES ##################
###############################################*/
    //retorna  se o titulo do post estiver vazio e existir  outro com mesmo nome
    private function title_empr_exists($title)
    {
        if ($this->setTitleEmpr($title) == true) {
            $this->dados['retorno'] = Alert::AjaxDanger("<b>Esse Titulo <ins>{$title}</ins> já existe.");
            $this->return_ajax_error($this->dados);
        }
    }
}