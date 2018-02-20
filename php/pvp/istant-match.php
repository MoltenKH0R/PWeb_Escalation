<head>
<link href="../../styles/istant-match.css" type="text/css" rel="stylesheet">

</head>
<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
$character = $_COOKIE['char'];
$user = $_COOKIE['user'];
include("../utils/dbConfig.php");
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

$getPlayer = "SELECT * FROM character_identifier WHERE characterID = \"$character\"";

$player = array(/* name, level, honor, itemlevel, health, attack, dodge, defence, criticchance, criticalstk */);

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
}else echo $connection->error;

$player[7] = $player[7]*100;
$player[8] = $player[8]*100;



/*                 enemy                      */
$enemy = array();
$min = 0;
if($player[1]<=2){$min = 1;}else{$min = $player[1]-2; }
$enemyLevel = rand($min, $player[1]+2);

$getEnemy = "SELECT * FROM character_identifier WHERE faction <> \"$player[10]\" AND userID <> \"$user\" AND level = \"$enemyLevel\" ORDER BY RAND() LIMIT 1";

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
}


  print("<div id=\"left-panel\">
    <div class=\"name-holder\">
      <div class=\"banner\">
        <img src=\"../../images/" . $player[10] . ".png\">
      </div>
      <h2>" . $player[0] . "</h2>
      <h5>Level: ".$player[1]."</h5>
    </div>
    <div class=\"main-score\">
      <h3>&#x26CA; ". $player[2] ." &nbsp;<b>⚔</b> ".$player[3]." ILVL</h3>
    </div>");

    for($i = 4; $i<7; $i++){
      print("<div class=\"stat\">
        <p>". $player[$i] ."</p>
      </div>");
    }
    for($i = 7; $i<9; $i++){
      print("<div class=\"stat\">
        <p>". $player[$i] ." %</p>
      </div>");
    }
    print("<div class=\"stat\">
      <p>". $player[9] ."</p>
    </div>");
    print("</div>");
    print("<div id=\"center-panel\">
      <p>VS</p>
      <img src=\"../../images/health.png\">
      <img src=\"../../images/attack.png\">
      <img src=\"../../images/dodge.png\">
      <img src=\"../../images/defence.png\">
      <img src=\"../../images/critc.png\">
      <img src=\"../../images/crits.png\">
    </div>");
    print("<div id=\"right-panel\">
    <div class=\"name-holder\">
      <div class=\"banner\">
        <img src=\"../../images/" . $enemy[10] . ".png\">
      </div>
      <h2>" . $enemy[0] . "</h2>
      <h5>Level: ".$enemy[1]."</h5>
    </div>
    <div class=\"main-score\">
      <h3>&#x26CA; ". $enemy[2] ." &nbsp;<b>⚔</b> ".$enemy[3]." ILVL</h3>
    </div>");

    for($i = 4; $i<7; $i++){
      print("<div class=\"stat\">
        <p>". $enemy[$i] ."</p>
      </div>");
    }
    for($i = 7; $i<9; $i++){
      print("<div class=\"stat\">
        <p>". $enemy[$i] ." %</p>
      </div>");
    }
    print("<div class=\"stat\">
      <p>". $enemy[9] ."</p>
    </div>");
      print("</div>
            </div>
            <div class=\"duel-button\">
              <button type=\"button\" onclick=\"winner(&#34;"."$enemy[0]"."&#34;)\">DUEL!</button>
            </div>");
?>
