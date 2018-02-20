<?php
  $char = $_GET["char"];

  setcookie("char", $char, time()+(86400*30), "/");

  header("Location: ../../home.php");

 ?>
