<?php

  setcookie("user", "", time()-3600, "/");
  setcookie("char", "", time()-3600, "/");

  header("Location: php/login/login.php");
 ?>
