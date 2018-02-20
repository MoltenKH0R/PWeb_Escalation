<?php

$username = $_COOKIE['user'];
$character = $_COOKIE["char"];

include('php/utils/dbConfig.php');
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

$getPlayerInfo = "SELECT * FROM character_identifier WHERE characterID = \"$character\"";
$getpRank = "SELECT * FROM character_identifier ORDER BY honor DESC LIMIT 10";

$player = array();
$players = array(array());

$result = $connection->query($getPlayerInfo);
$row = $result->fetch_assoc();
$player[0] = $row["characterID"];
$player[1] = $row["level"];
$player[2] = $row["faction"];
$player[3] = $row["race"];
$player[4] = $row["honor"];

$result = $connection->query($getpRank);
$i=0;
while($row = $result->fetch_assoc()){
  $players[$i][0] = $row["characterID"];
  $players[$i][1] = $row["level"];
  $players[$i][2] = $row["faction"];
  $players[$i][3] = $row["race"];
  $players[$i][4] = $row["honor"];
  $i++;
}


?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/leaderboard.css" type="text/css" rel="stylesheet">

<body>


<?php
print("<div class=\"player-tab\" style=\"background-color: #30303080\">
        <div class=\"rank\">
          <p></p>
          </div>
          <div class=\"name\">
          <h2>".$player[0]."</h2>
          </div>
          <div class=\"lvl\">
          <h3>".$player[1]."</h3></div>
          <div class=\"faction\"><h3>".$player[2]."</h3></div>
          <div class=\"guild\"><p>".$player[3]."</p></div>
          <div class=\"power\"><h2>".$player[4]."</h2></div>
          </div>");

  for($i = 0; $i <sizeof($players); $i++){
    print("<div class=\"player-tab\">
            <div class=\"rank\">
              <p>".($i+1)."</p>
              </div>
              <div class=\"name\">
              <h2>".$players[$i][0]."</h2>
              </div>
              <div class=\"lvl\">
              <h3>".$players[$i][1]."</h3></div>
              <div class=\"faction\"><h3>".$players[$i][2]."</h3></div>
              <div class=\"guild\"><p>".$players[$i][3]."</p></div>
              <div class=\"power\"><h2>".$players[$i][4]."</h2></div>
              </div>");
  }

 ?>
