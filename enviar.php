<?php
$name = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$message = "Este mensaje fue enviado por: " . $nome . " \r\n";
$message .= "Su e-mail es: " . $email . " \r\n";
$message .= "Mensaje: " . $_POST['mensagem'] . " \r\n";
$message .= "Enviado el: " . date('d/m/Y', time());

$para = 'dgleysilva@gmail.com';
$asunto = $assunto;

mail($para, $asunto, utf8_decode($message), $header);

header("Location:index.html");
?>