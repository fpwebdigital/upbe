<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
date_default_timezone_set('America/Araguaina');
require("class/class.phpmailer.php");

$nome = $_POST['nome2'];
$email = $_POST['seuemail2'];
$celular = $_POST['telcel2'];
$fixo = $_POST['telfixo2'];
$tipo = $_POST['tipo'];
$msg = $_POST['msg'];


// Inicia a classe PHPMailer
$mail = new PHPMailer();
$mail->CharSet  = "UTF-8";
$phpmailer->CharSet  = "UTF-8";


$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Autenticação
$mail->Username = 'contato@upbe.me'; // Usuário do servidor SMTP
$mail->Password = 'Upbe2017!'; // Senha da caixa postal utilizada



// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "contato@upbe.me"; // Seu e-mail
$mail->Sender = "contato@upbe.me"; // Seu e-mail
$mail->FromName = "Formulário de Solicitação de Plano"; // Seu nome

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
$mail->Subject  = "Formulário de Solicitação de Plano"; // Assunto da mensagem
$mail->Body = 'Formulário de Solicitação de Plano enviado pelo site
<p><b>Nome:</b> '.$nome.'
<p><b>E-mail:</b> '.$email.'
<p><b>Celular:</b> '.$celular.'
<p><b>Tel. Fixo:</b> '.$fixo.'
<p><b>Plano:</b> '.$tipo.'
<hr>';
$mail->AltBody = 'Formulário de Solicitação de Plano enviado pelo site \r\n 
<p><b>Nome:</b> '.$nome.'
<p><b>E-mail:</b> '.$email.'
<p><b>Celular:</b> '.$celular.'
<p><b>Tel. Fixo:</b> '.$fixo.'
<p><b>Plano:</b> '.$tipo.'
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