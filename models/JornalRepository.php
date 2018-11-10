<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 27/10/18
 * Time: 11:58
 *
 * Classe de ropostreios de metodos de create , read, update e delete que auxiliam o controller
 */

class JornalRepository extends JornalPost
{
    public function setArqGoogleDrive($FormJornal)
    {
        $this->title_jornal_exists($FormJornal['jorn_title']);

        $strg   = 'd/';
        $mypdf = strpos( $FormJornal['jorn_url'], $strg );//verifica a ocorrencia "v=" na string
        if (!$mypdf === false) {
            $url = strip_tags(trim($FormJornal['jorn_url']));
            if (substr_count($url, 'google') == 1) {
                $idGoogle = substr(strstr($url, "d/"), +2);//pega tudo depois da letra d/
                $idG = ((strlen($idGoogle) > 28) ? substr($idGoogle, 0, 28) : $idGoogle); //pega somente o id
                $urlAnt = strstr($url, "d/", true);//pega antes da d/
                $urlDepos = substr($idGoogle, 28);//pega depois do d/
                $fullUrl = $urlAnt . 'd/' . $idG . $urlDepos ;//aki junta tudo
            }
        } else {
            $this->dados['retorno'] = Alert::AjaxDanger("<b>Não é possível adicionar o Documento PDF à lista.</b>");
            $this->dados['redirect'] = Alert::AjaxRedirect("jornal/addJornal");
            $this->return_ajax_error($this->dados);
        }

        $dadosGoogleDrive = [
            "titulo_jornal" => $FormJornal['jorn_title'],
            "link_jornal" => $fullUrl,

        ];
        return $this->InsertG_Drive_Link($dadosGoogleDrive);
    }
    /*Atualiza as galerias de fotos ou albuns, enviando as imagens para cadastro no banco do dados*/
    public function updateJornal($FormJornal)
    {
        //verifica se o usuario quer mater ou não o mesmo titulo
        if($FormJornal['title_exist'] == '0') {
            $this->upArqGoogleDrive($FormJornal);
        }else{
            $this->dados['retorno'] = Alert::AjaxInfo("<b>Esse Titulo <ins>{$FormJornal['jorn_title']}</ins> já existe.
                <p>
                <button class='btn btn-primary manterTitlePost'>Manter</button>
                <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                </p>");
            $this->return_ajax_error($this->dados);
        }
        return true;
    }
    //retorna resposta do ajax
    public function return_ajax_error($data)
    {
        echo json_encode($data);
        exit();
    }


    /*###########################  PRIVATES ##################################*/
    private function title_jornal_exists($title)
    {
        if ($this->setTitleJorn($title) == true) {
            $this->dados['retorno'] = Alert::AjaxDanger("<b>Esse Titulo <ins>{$title}</ins> já existe.");
            $this->return_ajax_error($this->dados);
        }
    }
}