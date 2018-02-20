<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
$character = $_COOKIE["char"];

 ?>

<head>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/support-form.css" type="text/css" rel="stylesheet">
</head>
<div id="form-container">
  <h1>Contact Form</h1>
  <p>Provide your email addreass and your Character name followed by the issue you are encountering.<br>We will reply as soon as possible directly in your inbox. <br>Check your <b>SPAM</b> folder in case you don't see any reply in 48 hours.</p>
  <form method="post" name="contact-form" action="php/utils/contact-form-handler.php">
    <input type="text" name="email" placeholder="email address" required="required">
    <textarea type="text" name="message" placeholder="Tell us how can we help you" required="required"></textarea>
    <input type="submit" value="submit">
  </form>
</div>
