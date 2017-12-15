<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
date_default_timezone_set('America/Araguaina');
require("class/class.phpmailer.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$msg = $_POST['msg'];

// Desabilita mensagem de warning
ini_set( 'display_errors','0');

// Inicia a classe PHPMailer
$mail = new PHPMailer();
$mail->CharSet  = "UTF-8";
//$phpmailer->CharSet  = "UTF-8";


$mail->IsSMTP(); // Define que a mensagem será SMTP

$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->Username = 'atendimento@upbe.me'; // Usuário do servidor SMTP
$mail->Password = 'Upbe2017!'; // Senha da caixa postal utilizada



// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "atendimento@upbe.me"; // Seu e-mail
$mail->Sender = "atendimento@upbe.me"; // Seu e-mail
$mail->FromName = "Formulário de Orçamento"; // Seu nome

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
$mail->Subject  = "Formulário da Página Orçamento"; // Assunto da mensagem
$mail->Body = 'Formulário de Contato
<p><b>Nome:</b> '.$nome.'
<p><b>E-mail:</b> '.$email.'
<p><b>Mensagem</b> '.$msg.'
<hr>';
$mail->AltBody = 'Formulário da Página Orçamento \r\n 
<p><b>Nome:</b> '.$nome.'
<p><b>E-mail:</b> '.$email.'
<p><b>Mensagem</b> '.$msg.'
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