<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 21/10/18
 * Time: 06:48
 *
 */

/**/
class EmprRepository extends EmprPost
{

    /*valida  os dados para o cadastro das empresas e  se conecta com o controler para execução do cadastro*/
    public function addEmprCreate($FormEmpr)
    {
        $this->marca_empr_exists($FormEmpr['marca_emp']);
        $this->emailValido($FormEmpr['email_emp']);
        $FormEmpr['slug_emp'] = Check::Name($FormEmpr['marca_emp']);
        $FormEmpr['image_emp'] = (!empty($_FILES['image_emp']['name']) ? $_FILES['image_emp'] : null);

        if ($FormEmpr['image_emp'] != null || !empty($_FILES['image_emp']['name'])) {
            //upload da capa
            $Upload = new Upload('../uploads/');
            $Upload->Image($FormEmpr['image_emp'], Check::Name($FormEmpr['marca_emp']), 1600, 'empresas');
            $FormEmpr['image_emp'] = $Upload->getResult();

            return $this->insertEmpr($FormEmpr);
        }else{
            $this->dados['retorno'] = Alert::AjaxDanger("<b>Erro ao enviar img  de capa!!</b>");
            $this->return_ajax_error($this->dados);
        }


    }
    /*valida  os dados para a atualização dos cadastros das empresas e  se conecta com o controler para execução do update*/
    public function upEmprPost($FormEmpr)
    {
       $this->emailValido($FormEmpr['email_emp']);
        $FormEmpr['slug_emp'] = Check::Name($FormEmpr['marca_emp']);
        $FormEmpr['image_emp'] = (!empty($_FILES['image_emp']['name']) ? $_FILES['image_emp'] : null);

        //verifica se o usuario quer mater ou não o mesmo titulo
        if($FormEmpr['title_exist'] == '0') {
            $this->SendCoverEmpr($FormEmpr);//
        }else{
            $this->dados['retorno'] = Alert::AjaxInfo("<b><ins>{$FormEmpr['title_post']}</ins> já existe.</b>
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

/*#############################################
################### PRIVATES ##################
###############################################*/


   /*valida o email ao cadastrar , verificamdo se ele é válido*/
    private function emailValido($email)
    {
        if (!Check::isMail($email)) {
            $this->dados['retorno'] = Alert::AjaxWarning("<b>O email informado não tem um formato válido!!</b>");
            $this->return_ajax_error($this->dados);
        }
    }
/*valida o  nome da marca das empresas*/
    private function marca_empr_exists($marc)
    {
        if ($this->setNomeMarcaEmpr($marc)) {
            $this->dados['retorno'] = Alert::AjaxWarning("<b>Essa marca <ins>{$marc}</ins> já existe no sistema!!</b>");
            $this->return_ajax_error($this->dados);
        }
    }


    /*envia uma nova capa pra galeria apagando a antiga*/
    private function SendCoverEmpr($FormEmpr)
    {
        $idEmpr = $FormEmpr['id_emp'];

        //reenvio da capa do post
        if (is_array($FormEmpr['image_emp'])) {
            $capa = $this->setCoverEmpr($idEmpr);
            $coverEmp = "../uploads/". $capa['image_cliente_empresa'];

            //exclui a capa antiga
            if (file_exists($coverEmp) && !is_dir($coverEmp)) {
                unlink($coverEmp);
            }
            //faz o upload da nova capa
            $uploadCapa = new Upload('../uploads/');
            $uploadCapa->Image($FormEmpr['image_emp'], Check::Name($FormEmpr['marca_emp']), 600, 'empresas');

            if (isset($uploadCapa) && $uploadCapa->getResult()) {
                $FormEmpr['image_emp'] = $uploadCapa->getResult();

                //envia a capa nova para atualizar no banco
                $this->updateEmpresa($FormEmpr);//
            }
        }else{

            //atualiza os dados sem trocar a capa
            unset($FormEmpr['image_emp']);
            $this->updateEmpresa($FormEmpr);//;
        }
    }
}