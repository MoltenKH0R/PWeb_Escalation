<?php
  $username = $_GET["email"];

    include('../utils/dbConfig.php');
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    $findUser = "SELECT userID FROM user_data WHERE email = \"$username\"";
    $result = $connection->query($findUser);
    if($result->num_rows > 0){
      echo "TRUE";
    }else echo "FALSE";

 ?>
