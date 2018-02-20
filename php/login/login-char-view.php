<link href="../../styles/login-char-view.css" type="text/css" rel="stylesheet">
<?php
  $character = $_GET["char"];
  $user = $_COOKIE["user"];
    include('../utils/dbConfig.php');
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    $char_info = "SELECT * FROM `character_identifier` WHERE characterID = \"$character\"";

    $result = $connection->query($char_info);
    $charinfo = array();

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $charinfo[0] = $row["faction"];
        $charinfo[1] = $row["race"];
        $charinfo[2] = $row["class"];
        $charinfo[3] = $row["gold"];
        $charinfo[4] = $row["level"];
        $charinfo[5] = $row["itemlvl"];
        $charinfo[6] = $row["honor"];
      }
    }else { echo "ERROR: ". $result ."<br>".$connection->error;}

    print("
      <body>
      <div id=\"top-info\">
        <h1>".$character."</h1>
        <h2>LVL: ".$charinfo[4]."</h2>
      </div>

        <div id=\"left\">
          <h2 style=\"color: #ffbb2b;\">&#8370;&nbsp; ".$charinfo[3]."</h2><br>
          <h2>ItemLevel&nbsp; ".$charinfo[5]."</h2><br>
          <h2>Honor&nbsp; ".$charinfo[6]."</h2>
        </div>
        <div id=\"right\">
          <h2>".$charinfo[0]."</h2><br>
          <h2>".$charinfo[1]."</h2><br>
          <h2>".$charinfo[2]."</h2><br>
        </div>

        <button class=\"play\" type=\"button\" name=\"button\" onclick=\"loadgame(&#34;".$character."&#34;)\">PLAY</button>
        <button class=\"play\" type=\"button\" name=\"button\" onclick=\"deleteChar(&#34;".$character."&#34;)\">DELETE</button>
      </body>
    ");
 ?>
