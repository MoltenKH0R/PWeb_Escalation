<?php
  include('../utils/dbConfig.php');

  $username = $_POST['username'];
  $email = $_POST['email'];
  $confirm_email = $_POST['cemail'];
  $password = $_POST['password'];
  $confirm_password = $_POST['cpassword'];
  $nationality = $_POST['country'];
  $firstname = $_POST['name'];
  $lastname = $_POST['lastn'];
  $birth = $_POST['birth'];

  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $already_user = "SELECT * FROM user WHERE userID = '$username'";
  $already_email = "SELECT * FROM user_data WHERE email = '$email'";

  $check_user = $connection->query($already_user);
  if($check_user->num_rows > 0){
    echo "user esistente";
    exit();
  }
  $check_email = $connection->query($already_email);
  if($check_email->num_rows > 0){
    echo "utente già registrato";
    exit();
  }
  if($email != $confirm_email || $password != $confirm_password){
    echo "controlla i dati";
    exit();
  }

  $new_user = "INSERT INTO user (`userID`) VALUES ('$username');";
  $new_user_data = "INSERT INTO user_data (`email`, `password`, `name`, `lastname`,`birth`, `userID`) VALUES ('$email', '$password', '$firstname', '$lastname', '$birth', '$username');";
  $inewuser = FALSE;
  if($connection->query($new_user) === TRUE){
      $inewuser = TRUE;
  }else { echo "ERROR:".$new_user."<br>".$connection->error;}
  if($inewuser){
    if($connection->query($new_user_data)== TRUE){
      header("Location:../login/login.php");
    }else { echo "ERROR:".$new_user_data."<br>".$connection->error;}
  }



 ?>
