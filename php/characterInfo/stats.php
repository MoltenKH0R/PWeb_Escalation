<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
 $username = $_COOKIE['user'];
 $characterID = $_COOKIE['char']; 
  ?>
<link href="styles/stats.css" type="text/css" rel="stylesheet">
  <?php

    include('../utils/dbConfig.php');
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    $getHealth = "SELECT health FROM character_identifier WHERE characterID = '$characterID'";
    $getAtk = "SELECT atkpw FROM character_identifier WHERE characterID = '$characterID'";
    $getDefencertg = "SELECT defencertg FROM character_identifier WHERE characterID = '$characterID'";
    $getDodge = "SELECT dodge FROM character_identifier WHERE characterID = '$characterID'";
    $getCritchance = "SELECT critchance FROM character_identifier WHERE characterID = '$characterID'";
    $getCriticalstk = "SELECT criticalstk FROM character_identifier WHERE characterID = '$characterID'";


    $health = $connection->query($getHealth);
    $row = $health->fetch_assoc();
    $health = (int) $row["health"];

    $attack = $connection->query($getAtk);
    $row = $attack->fetch_assoc();
    $attack = (int) $row["atkpw"];

    $defence = $connection->query($getDefencertg);
    $row = $defence->fetch_assoc();
    $defence = (float) $row["defencertg"];

    $dodge = $connection->query($getDodge);
    $row = $dodge->fetch_assoc();
    $dodge = (int) $row["dodge"];

    $critChance = $connection->query($getCritchance);
    $row = $critChance->fetch_assoc();
    $critChance = (float) $row["critchance"];

    $criticalstk = $connection->query($getCriticalstk);
    $row = $criticalstk->fetch_assoc();
    $criticalstk = (int) $row["criticalstk"];


   ?>

<div class="stat-pane">
  <img src="images/health.png">
  <h4>HEALTH</h4>
  <h5 style="color:green"><?php echo $health ?></h5><br>
</div>


<div class="stat-pane">
  <img src="images/attack.png">
  <h4>ATTACK</h4>
  <h5 style="color:yellow"><?php echo $attack ?></h5><br>
</div>


<div class="stat-pane">
  <img src="images/dodge.png">
  <h4>DODGE</h4>
  <h5 style="color:darkblue"><?php echo $dodge ?></h5><br>
</div>

<div class="stat-pane">
  <img src="images/defence.png">
  <h4>DEFENCE</h4>
  <h5 style="color:darkred"><?php echo ($defence*100)."%" ?></h5><br>
</div>

<div class="stat-pane">
  <img src="images/critc.png">
  <h4>CR-CHANCE</h4>
  <h5 style="color:orange"><?php echo ($critChance*100)."%" ?></h5><br>
</div>


<div class="stat-pane">
  <img src="images/crits.png">
  <h4>CRIT-STRIKE</h4>
  <h5 style="color:lightblue"><?php echo $criticalstk ?></h5><br>
</div>
