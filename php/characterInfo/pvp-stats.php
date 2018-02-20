<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $username = $_COOKIE['user'];
  $character = $_COOKIE['char'];

  include("../utils/dbConfig.php");
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
  $getStats = "SELECT pvpw , pvpl FROM character_identifier WHERE characterID = \"$character\"";

  $result = $connection->query($getStats);

  $pvp = array();
  $rate = 0;
  if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
      $pvp[0] = $row["pvpw"];
      $pvp[1] = $row["pvpl"];
    }
  }else echo $connection->error;
  if($pvp[0] == 0 && $pvp[1] == 0){
    $rate = 0;
  }else{
    $rate = (100/$pvp[0]+$pvp[1])*$pvp[0];
  }

 ?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/tab-selector.css" type="text/css" rel="stylesheet">
<link href="styles/pvp-stats.css" type="text/css" rel="stylesheet">


<div class="header-list">
  <h4>Mode</h4>
  <h5>Rate</h5>
  <h5>Wins</h5>
  <h5>Games</h5>
</div>
<div class="separator"></div>


 <div class="row-mode">
   <h4>Istant Duel</h4>
   <h5><?php echo $rate."%" ?></h5>
   <h5><?php echo $pvp[0]; ?></h5>
   <h5><?php echo $pvp[0]+$pvp[1]; ?></h5>
 </div>
