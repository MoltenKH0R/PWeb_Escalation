<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $username = $_COOKIE["user"];
  $characterID = $_COOKIE["char"];

  include('../utils/dbConfig.php');
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $getFaction = "SELECT faction FROM character_identifier WHERE characterID = '$characterID'";
  $getRace = "SELECT race FROM character_identifier WHERE characterID = '$characterID'";
  $getClass = "SELECT class FROM character_identifier WHERE characterID = '$characterID'";
  $getGold = "SELECT gold FROM character_identifier WHERE characterID = '$characterID'";
  $getLevel = "SELECT level FROM character_identifier WHERE characterID = '$characterID'";
  $getHonor = "SELECT honor FROM character_identifier WHERE characterID = '$characterID'";
  $getIlvl = "SELECT itemlvl FROM character_identifier WHERE characterID = '$characterID'";
  $getHealth = "SELECT health FROM character_identifier WHERE characterID = '$characterID'";

  $faction = $connection->query($getFaction);
  $row = $faction->fetch_assoc();
  $faction = $row["faction"];

  $race = $connection->query($getRace);
  $row = $race->fetch_assoc();
  $race = $row["race"];

  $class = $connection->query($getClass);
  $row = $class->fetch_assoc();
  $class = $row["class"];

  $level = $connection->query($getLevel);
  $row = $level->fetch_assoc();
  $level = $row["level"];

  $health = $connection->query($getHealth);
  $row = $health->fetch_assoc();
  $health = $row["health"];


  $honor = $connection->query($getHonor);
  $row = $honor->fetch_assoc();
  $honor = $row["honor"];

  $ilevel = $connection->query($getIlvl);
  $row = $ilevel->fetch_assoc();
  $ilevel = $row["itemlvl"];

  $gold = $connection->query($getGold);
  $row = $gold->fetch_assoc();
  $gold = $row["gold"];


 ?>

<link href="styles/player-info.css" rel="stylesheet" type="text/css">
<div id="player-info">
  <div id="left">
    <img src="images/<?php echo $faction ?>.png">
  <div id="name-container">
    <h2><?php echo $characterID ?></h2><br>
    <p><?php echo $faction  ?></p>
  </div>
  </div>
  <div id="right">
    <h4>&#x26CA; <?php echo $honor ?> &nbsp;<b>⚔</b> <?php echo $ilevel ?> ILVL&nbsp;</h4><h4 id="currency" style="color: green;"><b>&#8370;</b> <?php echo $gold ?></h4>

    <br>
    <p><?php echo "Level ".$level." &nbsp".$race." &nbsp".$class ?></p>
</div>
