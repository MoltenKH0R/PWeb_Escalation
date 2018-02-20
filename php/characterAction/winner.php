<head>
<link href="../../styles/winner.css" type="text/css" rel="stylesheet">

</head>
<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $Gplayer = $_COOKIE["char"];
  $Genemy = $_GET["enemy"];

  include("../utils/dbConfig.php");
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $getPlayer = "SELECT * FROM character_identifier WHERE characterID = \"$Gplayer\"";

  $player = array(/* name, level, honor, itemlevel, health, attack, dodge, defence, criticchance, criticalstk */);
  $enemy = array();


  $result = $connection->query($getPlayer);
    if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $player[0] = $row["characterID"];
    $player[1] =(int) $row["level"];
    $player[2] =(int) $row["honor"];
    $player[3] =(int) $row["itemlvl"];
    $player[4] =(int) $row["health"];
    $player[5] =(int) $row["atkpw"];
    $player[6] =(int) $row["dodge"];
    $player[7] =(float) $row["defencertg"];
    $player[8] =(float) $row["critchance"];
    $player[9] =(int) $row["criticalstk"];
    $player[10] = $row["faction"];
    $player[11] =(int) $row["pvpw"];
    $player[12] =(int) $row["pvpl"];
    $player[13]=(int) $row["gold"];
  }else echo $connection->error;

  $player[7] = $player[7]*100;
  $player[8] = $player[8]*100;

$getEnemy = "SELECT * FROM character_identifier WHERE characterID = \"$Genemy\"";

  $result = $connection->query($getEnemy);
  if($result->num_rows > 0 ){
    $row = $result->fetch_assoc();
    $enemy[0] = $row["characterID"];
    $enemy[1] =(int) $row["level"];
    $enemy[2] =(int) $row["honor"];
    $enemy[3] =(int) $row["itemlvl"];
    $enemy[4] =(int) $row["health"];
    $enemy[5] =(int) $row["atkpw"];
    $enemy[6] =(int) $row["dodge"];
    $enemy[7] =(float) $row["defencertg"];
    $enemy[8] =(float) $row["critchance"];
    $enemy[9] =(int) $row["criticalstk"];
    $enemy[10] = $row["faction"];
    $enemy[11] =(int) $row["pvpw"];
    $enemy[12] =(int) $row["pvpl"];
    $enemy[13] =(int) $row["gold"];
  }
  $players = array($player, $enemy);



  $turn = rand(0, 1);
  $nturn = 0;
  if($turn == 0){
    $nturn = 1;
  }else $nturn = 0;

  match($players, $turn, $nturn, $Gplayer, $Genemy, $connection);


  function match($players, $turn, $nturn, $Gplayer, $Genemy, $connection){
    $round = 1;
    while($players[$turn][4] > 0 && $players[$nturn][4] > 0){
      echo "<p><b>Round ".$round." ".$players[$turn][0]."'s turn:</b><br><br>";
      $damage = $players[$turn][5];
      $absorb = 0;

      if(dice($players[$turn][8])){
        $damage += $players[$turn][9];
        echo "CRITICAL STRIKE! DAMAGE INCREASED TO ".$damage."<br>";
      }

      if(dice($players[$nturn][7])){
        $absorb += $players[$nturn][6];
        echo "PARRY! DAMAGE REDUCED BY ".$absorb."<br>";
      }
      if($damage > $absorb){
      $players[$nturn][4] -= ($damage - $absorb);
      echo $players[$turn][0]." strikes ".($damage-$absorb).", ".$players[$nturn][0]."'s health reaches ".$players[$nturn][4]."<br>";
      echo "-----------------------------------------------------------------------------------------------------------------------<br></p>";
      }
      $ap = $turn;
      $turn = $nturn;
      $nturn = $ap;
      $round++;
    }
    if($players[0][4] <= 0) enemyHonor($players, $Gplayer, $Genemy, $connection);
    if($players[1][4] <= 0) playerHonor($players, $Gplayer, $Genemy, $connection);

  }

  function dice($value){
    if(rand($value, 100) <= $value){
      return TRUE;
    }else return FALSE;
  }

  function playerHonor($players, $Gplayer, $Genemy, $connection){
    $honor = $players[0][2]+(10+($players[1][1]-$players[0][1]));
    $wins = $players[0][11]+1;
    $dump = pow($players[0][1], 3);
    $gold = $players[0][13] + ((10+($players[1][1]-$players[0][1]))*10);
    if($honor >= ($dump*10)){ $level = $players[0][1]+1; }else $level = $players[0][1];
    $updateHonor = "UPDATE character_identifier SET honor = \"$honor\", pvpw = \"$wins\", level = \"$level\", gold = \"$gold\" WHERE characterID = \"$Gplayer\"";
    $result = $connection->query($updateHonor);


    $honor = $players[1][2]-(10-($players[1][1]-$players[0][2]));
    $loss = $players[1][12]+1;
    $gold = $players[1][13] - ((10+($players[1][1]-$players[0][1]))*10);
    $updateHonor = "UPDATE character_identifier SET honor = \"$honor\", pvpl = \"$loss\", gold = \"$gold\" WHERE characterID = \"$Genemy\"";

    echo "<p>".$players[0][0]." WINS, GAINING ".(10+($players[1][1]-$players[0][1]))." HONOR AND ".((10+($players[1][1]-$players[0][1]))*10)." GOLD, LEVELING AT: ".$level." LEVEL<br><br>";
    echo $players[1][0]." has lost ".(10-$players[1][2])." honor.</p>";
  }

  function enemyrHonor($players, $Gplayer, $Genemy, $connection){
    $honor = $players[1][2]+(10+($players[0][1]-$players[1][1]));
    $wins = $players[1][11]+1;
    $dump = pow($players[1][1], 3);
    $gold = $players[1][13] + ((10+($players[0][1]-$players[1][1]))*10);
    if($honor >= ($dump*10)){ $level = $players[1][1]+1; }else $level = $players[1][1];
    $updateHonor = "UPDATE character_identifier SET honor = \"$honor\", pvpw = \"$wins\", level = \"$level\", gold = \"$gold\" WHERE characterID = \"$Genemy\"";
    $result = $connection->query($updateHonor);

    $honor = $players[0][2]-(10);
    $loss = $players[0][12]+1;
    $gold = $players[0][13] - ((10+($players[1][1]-$players[0][1]))*10);
    $updateHonor = "UPDATE character_identifier SET honor = \"$honor\", pvpl = \"$loss\", gold = \"$gold\" WHERE characterID = \"$Gplayer\"";

    echo "<p>".$players[1][0]." WINS, GAINING ".(10+($players[0][1]-$players[1][1]))." HONOR AND ".((10+($players[0][1]-$players[1][1]))*10)." GOLD, LEVELING AT: ".$level." LEVEL<br><br>";
    echo $players[0][0]." HAS LOST ".(10)." HONOR.</p>";
  }



 ?>
