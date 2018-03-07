<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 05/03/18
 * Time: 08:04
 */

class Email extends Model
{

    /** @var PHPMailer */
    private $Mail;
    private $Host;
    private $Port;
    private $Username;
    private $Password;
    private $CharSet;

    private $User;



    /** EMAIL DATA */
    private $Data;

    /** CORPO DO E-MAIL */
    private $Assunto;
    private $Mensagem;

    /** REMETENTE */
    private $RemetenteNome;
    private $RemetenteEmail;

    /** DESTINO */
    private $DestinoNome;
    private $DestinoEmail;

    public function __construct()
    {
        require_once('../library/PHPMailer/class.phpmailer.php');
        require_once('../library/PHPMailer/class.smtp.php');
        $this->Mail = new PHPMailer();
        $this->Mail->SetLanguage("br");
        $this->Mail->IsSMTP();
        $this->Mail->SMTPAuth = true;
        $this->Mail->Host = MAILHOST;//endereço de envio do smtp
        $this->Mail->Port = MAILPORT;//porta de envio
        $this->Mail->Username = MAILUSER;//e mail criado do servidor e
        $this->Mail->Password = MAILPASS;// senha criada do servidor
        $this->Mail->CharSet = 'UTF-8';
    }

    public function setToken(array $Data)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE email_user = :email");
        $sql->bindValue(":email",$Data['email_us']);
        $sql->execute();

        //print_r($sql->fetch());exit;

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $idus = $sql['id_user'];


            $token = md5(time() . rand(0, 99999) . rand(0, 99999));

            $this->User['hash'] = $token;
            $this->User['expirado_em'] = date('Y-m-d H:i', strtotime('+1 months'));
            $this->User['id_user'] = $idus;


            $sql = $this->db->prepare("INSERT INTO tokens_users (hash, expirado_em, id_user) VALUES (:hash, :expirado_em, :iduser)");
            $sql->bindValue(":hash",        $this->User['hash']);
            $sql->bindValue(":expirado_em", $this->User['expirado_em']);
            $sql->bindValue(":iduser",      $this->User['id_user']);
            $sql->execute();


            return '1';

        }else{

            return '0';
        }
    }

    /*Metodo responsavel pelas configurações do email*/
//Recupera e separa os atributos pelo Array Data.
    public function setMailRec() {

        $this->Assunto       = $this->Data['Assunto'];
        $this->RecuperaEmail = $this->Data['RecuperaEmail'];
        $this->DestinoNome   = $this->Data['DestinoNome'];
        $this->DestinoEmail  = $this->Data['DestinoEmail'];

        $this->Data = null;
        $this->setMsgRec();
    }

    //Formatar ou Personalizar a Mensagem!
    public function setMsgRec() {
        $token  = $this->User['hash'];
        $Id     = $this->User['id_user'];
        $link = HOME."/redSenha.php?id={$Id}&token={$token}";
        $this->Mensagem = "Clique no link para redefinir sua senha:<br/>".$link;


        //$this->Mensagem = "{$this->Mensagem}<hr><small>Recebida em: " . date('d/m/Y H:i') . "</small>";
    }

    //Configura o PHPMailer e valida o e-mail!
    public function Config() {
        //SMTP AUTH
        $this->Mail->IsSMTP();
        $this->Mail->SMTPAuth = true;
        $this->Mail->IsHTML();

        //REMETENTE E RETORNO
        $this->Mail->From = MAILUSER;
        //$this->Mail->FromName = $this->id_Data;
        $this->Mail->AddReplyTo($this->RecuperaEmail);//, $this->RemetenteNome);//campos do formulario

        //ASSUNTO, MENSAGEM E DESTINO
        $this->Mail->Subject = $this->Assunto;
        $this->Mail->Body .= "Seguem os dados para redefinir sua senha:<br /><br />
								
							 <strong>Obs:</strong> Você não precisa responder este e-mail.
							 <strong>$this->Mensagem</strong>";
        $this->Mail->AddAddress($this->DestinoEmail, $this->DestinoNome);//aqui é usado um outro email do dominio pra enviar respostas e com nome personalizado se preferir
    }

    //Envia o e-mail!
    public function sendMailRec() {
        if ($this->Mail->Send() > 0){
            return '1';

        }else{

            return '0';
        }

    }

    /*public function paramEnvia($email,$nome,$ddd,$telefone,$assunto, $mensagem)
    {
        $this->Mail->IsHTML(true);
        $this->Mail->From = 'contato@wesleydesign.com.br';
        $this->Mail->FromName = utf8_decode($email);
        $this->Mail->AddReplyTo($email, $nome);
        $this->Mail->AddAddress("contato@wesleydesign.com.br");
        $this->Mail->Subject = "(Contato do site - seudominio.com.br)";
        $this->Mail->Body .= "<br /><br />
							 <strong>Nome:</strong> $nome<br /><br />
							 <strong>E-mail:</strong> $email<br /><br />
							 <strong>Telefone:</strong> $ddd - $telefone<br /><br />
							 <strong>Assunto:</strong> $assunto<br /><br />
							 <strong>Mensagem:</strong><br /> 
			$mensagem = '<img src='" . BASE . "assets/img/capa-min.png' alt='Capa do Canal' title='Capa do Site' /><br />"
            . "O email recebido foi de: <strong>{$dados_form['email']}</strong><br />"
            . "Mensagem: {$dados_form['msg']}'";



        if (!$this->Mail->Send()) {
            echo "<p>A mensagem não foi enviada. </p>";
            echo "Erro: " . $this->Mail->ErrorInfo;
        } else {
            echo "<script>location.href='sucesso.html'</script>";

        }

    }*/
}