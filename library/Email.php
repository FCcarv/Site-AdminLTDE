<?php

require '../library/Mailer/PHPMailerException.php';
require '../library/Mailer/SMTP.php';
require '../library/Mailer/PHPMailer.php';

use library\Mailer\PHPMailerException;
use library\Mailer\SMTP;
use library\Mailer\PHPMailer;

/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 24/02/18
 * cLASSE RESPONSAVEL POR ENVIAR EMAIL E CONFIGURAR AS INFORMAÇÕES NECESSÁRIAS PARA ISSO.
 */
class Email {

    /** @var PHPMailer */
    private $Mail;
    private $Host;
    private $Port;
    private $Username;
    private $Password;
    private $CharSet;

    /** EMAIL DATA */
    private $Data;

    /** CORPO DO E-MAIL */
    private $Assunto;
    private $Mensagem;

    /** DESTINO */
    private $DestinoNome;
    private $DestinoEmail;

    public function config() {

        $this->Mail = new PHPMailer();
        $this->Mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
        $this->Mail->IsSMTP();

        //$this->Mail->SMTPDebug = 3; /* Debug */

        $this->Mail->Host = MAILHOST; //endereço de envio do smtp
        $this->Mail->SMTPAuth = true;
        $this->Mail->Username = MAILUSER; //e mail criado do servidor e
        $this->Mail->Password = MAILPASS; // senha criada do servidor
        $this->Mail->Port = MAILPORT; //porta de envio
        $this->Mail->SMTPSecure = 'tls';
        $this->Mail->CharSet = 'UTF-8';
    }
    /*
     * PEGA AS INFORMAÕES COMO EMAIL ENTRE OUTRAS
     * E DIRECIONA AS VARIAVEIS DETERMINANTES QUE SERÃO USADAS NO
     *  ENVIO DO EMAIL DO USUARIO PRA REDEFINIR SUA SENHA.
    */
    public function setMailRec(array $Data) {
        $this->Data = $Data;

        $this->Assunto       = $this->Data['Assunto'];
        $this->RecuperaEmail = $this->Data['RecuperaEmail'];
        $this->DestinoNome   = $this->Data['DestinoNome'];
        $this->DestinoEmail  = $this->Data['DestinoEmail'];
    }
    /*PEGA A MENSAGEM QUE SERÁ MANDADA POR EMAIL,
     por DE DE OUTRO METODO E O LINK DE REDEFINIÇÃO DE SENHA.
     */
    public function getMensagem($mensagem) {
        $this->Mensagem = $mensagem;
    }
    /*CONFIGURA O PHPMAILER E VALIDA O EMAIL A SER MANDADO PARA O USUARIO
     * USANDO VARIAVEIS DEFINIDAS NO METODO ACIMA  setMailRec().
    */
    public function enviar() {
        try {
            $this->config();

            //REMETENTE E RETORNO
            $this->Mail->setFrom(MAILUSER, "REDEFINIR SENHA");//"REDEFININDO SUA SENHA" -> Essa mensagem aparecera na caixa do email da pessoa que receber
            // ENDEREÇO DE DESTINO DO EMAAIL, OU SEJA, PRA ONDE VOCÊ QUER QUE A MENSAGEM DO FORMULÁRIO VÁ?
            $this->Mail->addAddress($this->RecuperaEmail, '- IZFriggi');

            //PARA QUEM SERÁ ENVIADA A MENSAGEM / $this->RemetenteNome);//campos do formulario //
            $this->Mail->addReplyTo($this->RecuperaEmail);
            $this->Mail->isHTML(true);
            //ASSUNTO, MENSAGEM E DESTINO
            $this->Mail->Subject = $this->Assunto;
            $this->Mail->Body .= "Seguem os dados para redefinir sua senha:<br /><br />

                             <strong>Obs:</strong> Você não precisa responder este e-mail.
                             <strong>$this->Mensagem</strong>";
            //aqui é usado um outro email do dominio pra enviar respostas e com nome personalizado se preferir
            if ($this->Mail->send()) {
                return true;
            }
        } catch (Exception $e) {
            echo 'Não foi possivel enviar o email.';
            echo 'Error: ' . $this->Mail->ErrorInfo;
        }
    }

}
