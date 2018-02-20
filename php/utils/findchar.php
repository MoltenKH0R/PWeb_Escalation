<?php
  $username = $_GET["user"];
  include('dbConfig.php');
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
  $get_user = "SELECT `characterID` FROM `character_identifier` WHERE `characterID` = \"$username\"";

  $result = $connection->query($get_user);

  if($result->num_rows > 0){
    echo "TRUE";
  }else echo "FALSE";

 ?>
