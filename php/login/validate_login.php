<?php
  include('../utils/dbConfig.php');

  $email = $_POST["email"];
  $password = $_POST["password"];
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $accountQuery = "SELECT * FROM user_data WHERE email = '$email' AND password = '$password'";
  $userQuery = "SELECT userID FROM user_data WHERE email = '$email'";

  $result = $connection->query($accountQuery);

  if($result->num_rows == 1){
    while($row = $result->fetch_assoc()){
      $validate = TRUE;
    }
  }else{
     echo "error";
     die;
  }


   $result = $connection->query($userQuery);
   if($validate && $result->num_rows > 0){
     while($row = $result->fetch_assoc()){
       $username = $row["userID"];
     }
     $cookie_name = "user";
     $cookie_value = $username;
      echo $username;
       die;
   }else{
     die;
   }

  $connection->close();
?>
