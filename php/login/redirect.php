<?php
  $username = $_GET["user"];
  setcookie("user", $username, time() + (86400*30), "/");
  header("Location: char_sel.php");
  die;
 ?>
