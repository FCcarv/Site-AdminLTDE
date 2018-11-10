<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 30/10/18
 * Time: 20:32
 */


class MessageRepository extends MessagePost
{
    public function addMg($FormMsg)
    {
        $this->titleExists($FormMsg['msg_title']);
        //var_dump($FormMsg);
        return $this->addMessage($FormMsg);
    }


    public function editarMsg($FormMsg)
    {
        $this->titleExists($FormMsg['msg_title']);

        //verifica se o usuario quer mater ou não o mesmo titulo
        if($FormMsg['title_exist'] == '0') {
            $this->updateMessage($FormMsg);//
        }else{
            $this->dados['retorno'] = Alert::AjaxInfo("<b>Esse Titulo <ins>{$FormMsg['msg_title']}</ins> já existe.
                <p>
                <button class='btn btn-primary manterTitlePost'>Manter</button>
                <button class='btn btn-warning mudarTitlePost'>Mudar</button>
                </p>");
            $this->return_ajax_error($this->dados);
        }
        return true;
        //var_dump($FormMsg);
    }

    //retorna resposta do ajax
    public function return_ajax_error($data)
    {
        echo json_encode($data);
        exit();
    }

    private function titleExists($title)
    {
        if ($this->setTitle($title) == true) {
            $this->dados['retorno'] = Alert::AjaxDanger("<b>Esse Titulo <ins>{$title}</ins> já existe.");
            $this->return_ajax_error($this->dados);
        }
    }
}