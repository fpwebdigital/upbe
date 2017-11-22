<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
date_default_timezone_set('America/Araguaina');
require("class/class.phpmailer.php");

$nome = $_POST['nome-dicas'];
$email = $_POST['email-dicas'];



// Inicia a classe PHPMailer
$mail = new PHPMailer();
$mail->CharSet  = "UTF-8";
$phpmailer->CharSet  = "UTF-8";


$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.upbe.me"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Autenticação
$mail->Username = 'naoresponder@upbe.me'; // Usuário do servidor SMTP
$mail->Password = 'contato$7987567'; // Senha da caixa postal utilizada



// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "naoresponder@upbe.me"; // Seu e-mail
$mail->Sender = "naoresponder@upbe.me"; // Seu e-mail
$mail->FromName = "Formulário Quero Receber Dicas"; // Seu nome

// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('contato@upbe.me');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Formulário Quero Receber Dicas"; // Assunto da mensagem
$mail->Body = 'Formulário Quero Receber Dicas
<p><b>Nome:</b> '.$nome.'
<p><b>E-mail:</b> '.$email.'
<hr>';
$mail->AltBody = 'Formulário Quero Receber Dicas \r\n 
<p><b>Nome:</b> '.$nome.'
<p><b>E-mail:</b> '.$email.'
<hr>';

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
if ($enviado) {
    echo "<script>alert('Mensagem Enviada com Sucesso'); location.href='index.html';</script>";
} else {
    echo "<script>alert('Erro ao enviar a mensagem'); location.href='index.html';</script>";
    echo "Informações do erro: 
" . $mail->ErrorInfo;
}

?>