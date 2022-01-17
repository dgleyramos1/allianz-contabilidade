<?php

##---------------------------------------------------
  ##  Envio de Emails pelo SMTP Aut�nticado usando PEAR
  ##---------------------------------------------------
  # Mais detalhes sobre o PEAR: 
  #   http://pear.php.net/
  #
  # Mais detalhes sobre o PEAR Mail:
  #   http://pear.php.net/manual/en/package.mail.mail-mime.php
  ##---------------------------------------------------
  
  # Faz o include do PEAR Mail e do Mime.
  include ("Mail.php");
  include ("Mail/mime.php");
  
  //Variaveis de POST, Alterar somente se necessário 
//===================================================
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
//====================================================


//Configurações do email, ajustar conforme necessidade
//==================================================== 
$email_reply = "$email"; 
//====================================================
  # E-mail de destino. Caso seja mais de um destino, crie um array de e-mails.
  # *OBRIGAT�RIO*
  $recipients = 'destinatario@gmail.com';

  # Cabe�alho do e-mail.
  $headers = 
    array (
      'From'    => 'email@dominio.com', # O 'From' � *OBRIGAT�RIO*.
      'To'      => $recipients,
      'Subject' => 'Mensagem enviada do site'
    );

  # Utilize esta op��o caso deseje definir o e-mail de resposta
  $headers['Reply-To'] .= "$email_reply";

  # Utilize esta op��o caso deseje definir o e-mail de retorno em caso de erro de envio
  # $headers['Errors-To'] = 'EMailDeRerornoDeERRO@DominioDeretornoDeErro.com';

  # Utilize esta op��o caso deseje definir a prioridade do e-mail
  # $headers['X-Priority'] = '3'; # 1 UrgentMessage, 3 Normal  

  # Define o tipo de final de linha.
  $crlf = "\r\n";

  # Corpo da Mensagem e texto e em HTML
  $text = "Nome: ".$_POST['nome']." <br>";
  $text .= "E-mail: ".$email. " <br>";
  $text .= "Assunto: ".$assunto. "<br>";
  $text .= "Mensagem: ".$mensagem. "";
  $html = "<HTML><BODY><font color=black>$text</font></BODY></HTML>";


  # Instancia a classe Mail_mime
  $mime = new Mail_mime($crlf);

  # Coloca o HTML no email
  $mime->setHTMLBody($html);


##  # Anexa um arquivo ao email.
  
  # Procesa todas as informa��es.
  $body = $mime->get();
  $headers = $mime->headers($headers);

  # Par�metros para o SMTP. *OBRIGAT�RIO*
  $params = 
    array (
      'auth' => true, # Define que o SMTP requer autentica��o.
      'host' => 'smtp.dominio.com', # Servidor SMTP
      'username' => 'site=dominio.com', # Usu�rio do SMTP
      'password' => 'senha' # Senha do seu MailBox.
    );
    
  # Define o m�todo de envio
  $mail = new Mail();
  $mail_object = $mail->factory('smtp', $params);

  # Envia o email. Se n�o ocorrer erro, retorna TRUE caso contr�rio, retorna um
  # objeto PEAR_Error. Para ler a mensagem de erro, use o m�todo 'getMessage()'.
  $result = $mail_object->send($recipients, $headers, $body);
  if (PEAR::IsError($result))
  {
    echo "<script>document.location = '../../pages/falha.html'</script>";
  }   
  else
  {
    echo "<script>document.location = '../../pages/sucesso.html'</script>";
       
  }
?>