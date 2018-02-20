<?php
  include('../utils/dbConfig.php');
  $charname = $_GET["charname"];
  $faction = $_GET["faction"];
  $race = $_GET["race"];
  $class = $_GET["class"];
  $user = $_GET["user"];
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);


  $query = "INSERT INTO `character_identifier` (`characterID`, `userID`, `faction`, `race`, `class`, `gold`, `level`, `honor`, `health`, `atkpw`, `defencertg`, `dodge`,
  `critchance`, `criticalstk`, `itemlvl`, `pvpw`, `pvpl`) VALUES (\"$charname\", \"$user\", \"$faction\", \"$race\", \"$class\" , '0', '1', '0', '10', '1', '0.0', '0', '0.0', '0', '1', '0', '0');";


  $added = FALSE;
  $result = $connection->query($query);
  if($result === TRUE){
    $added = TRUE;
  }else echo $connection->error;

  if($added){
    header("Location:../login/char_sel.php?user=$user");
  };

 ?>
