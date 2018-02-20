<?php
  include('../utils/dbConfig.php');

  $username = $_GET["user"];
  $character = $_GET["char"];

  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $delete = "DELETE FROM character_identifier WHERE characterID = '$character'";

  $result = $connection->query($delete);
  if($result){
    header("Location: ../login/char_sel.php?user=");
    exit;
  }else echo $connection->error;
 ?>
