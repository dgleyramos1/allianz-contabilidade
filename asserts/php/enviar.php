<?php

if (isset($_POST['BTEnvia'])) {

    //Variaveis de POST, Alterar somente se necessário 
    //====================================================
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
    //====================================================

    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //==================================================== 
    $email_remetente = "site@allianzcontabilidadecr.com"; // deve ser uma conta de email do seu dominio 
    //====================================================

    //Configurações do email, ajustar conforme necessidade
    //==================================================== 
    $email_destinatario = "dgleysilva@gmail.com"; // pode ser qualquer email que receberá as mensagens
    $email_reply = "$email"; 
    $email_assunto = "$assunto"; // Este será o assunto da mensagem
    //====================================================

    //Monta o Corpo da Mensagem
    //====================================================
    $email_conteudo = "Nome: ".$nome. "\n"; 
    $email_conteudo .= "Email: ".$email. "\n"; 
    $email_conteudo .= "Mensagem: ".$mensagem. "\n"; 
    //====================================================

    //Seta os Headers (Alterar somente caso necessario) 
    //==================================================== 
    $header = "From: $email_remetente".
              "Reply-To: ".$email_reply." \r\n".
              "Return-Path: ".$email_remetente." \r\n".
              "X=Mailer:PHP/".phpversion();
    //====================================================

    //Enviando o email 
    //==================================================== 
    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $header)){ 
        echo "<script>document.location = 'https://allianz-contabilidade.vercel.app/'</script>"; 
    } 
    else{ 
        echo "<script>document.location = 'https://allianz-contabilidade.vercel.app/'</script>";
    } 
    //====================================================
} 
?>