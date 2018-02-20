<?php
$selection = $_GET["selection"];
$loader = $_GET["loader"];

include('../utils/dbConfig.php');
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$get_list = "SELECT DISTINCT class FROM matrix WHERE race =".$selection;

if($loader=="race"){
  $get_list = "SELECT DISTINCT race FROM matrix WHERE faction =\"".$selection."\"";
  $result = $connection->query($get_list);
  $list = array();
  if($result->num_rows > 0){
    $i = 0;
    while($row = $result->fetch_assoc()){
      $list[$i] = $row["race"];
      $i++;
    }
  }else {echo "ERROR: " . $connection->error;}
  for($i=0; $i<sizeof($list); $i++){
    print("<button class=\"selection-button\" onclick=\"classLoader(&#34;".$list[$i]."&#34;);setRace(&#34;".$list[$i]."&#34;)\">".$list[$i]."</button>");
  }
}


if($loader=="class"){
  $get_list = "SELECT class FROM matrix WHERE race =\"".$selection."\"";
  $result = $connection->query($get_list);
  $list = array();
  if($result->num_rows > 0){
    $i=0;
    while($row = $result->fetch_assoc()){
      $list[$i] = $row["class"];
      $i++;
    }
  }else { echo "ERROR: ". $connection->$error;}

  for($i=0; $i<sizeof($list); $i++){
    print("<button class=\"selection-button\" onclick=\"setClass(&#34;".$list[$i]."&#34;)\">".$list[$i]."</button>");
  }
}


?>
