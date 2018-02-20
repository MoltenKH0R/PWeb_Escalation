<?php
  $username = $_COOKIE["char"];
  $client_mail = $_POST['email'];
  $request = $_POST['message'];


  $to = 'marco.pontone@live.it';
  $email_subject = 'Contact Support';
  $email_body = "USERNAME: $username \n MESSAGE: $request";
  $headers = "Reply-To: $client_mail "."\r\n";


  mail($to, $email_subject, $email_body, $headers);

  $sender = mail($to, $email_subject, $email_body, $headers);
  if($sender){
    header("Location: ../../home.php");
    die;
  }else echo "ERROR";
 ?>
