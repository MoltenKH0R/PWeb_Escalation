<link href="styles/inventory.css" type="text/css" rel="stylesheet">
<?php
  $character = $_COOKIE['char'];
  $category= $_GET['category'];

  include('php/utils/dbConfig.php');
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $getPLevel = "SELECT level FROM character_identifier WHERE characterID = \"$character\"";
  $result = $connection->query($getPLevel);
  $row = $result->fetch_assoc();
  $pLevel = $row["level"];

  $getPGold = "SELECT gold FROM character_identifier WHERE characterID = \"$character\"";
  $result = $connection->query($getPGold);
  $row = $result->fetch_assoc();
  $pGold = $row["gold"];

  $items = array($item = array());
    $j=0;
  $getItems = "SELECT * FROM item WHERE levelreq <= \"$pLevel\" AND category = \"$category\"";

  $result = $connection->query($getItems);
  while($row = $result->fetch_assoc()){
    $items[$j][0] = $row["itemID"];
    $items[$j][1] = $row["name"];
    $items[$j][2] = $row["itemlvl"];
    $items[$j][3] = $row["buy"];
    $items[$j][4] = $row["health"];
    $items[$j][5] = $row["levelreq"];
    $j++;
  }


  for($i = 0; $i<$j; $i++){
    print("<div class=\"inventory-item\">
      <img src=\"images/item.png\">
      <div class=\"item-primary-i\">
        <p>" . $items[$i][1]."</p>
        <h6>" . $items[$i][2] . "</h6>
        <h4>" . $category . "</h4>
        <h6>EQUIP-LVL: " . $items[$i][5] . "</h6>
      </div>
      <div class=\"item-stat-i\">
        <p>ID: " . $items[$i][0] . "</p>
        <h4>Health: " . $items[$i][4] . "</h4>

      </div>
      <div class=\"item-sell\">");
      if($items[$i][3] > $pGold){
        print("<button class=\"disabledb\">BUY: ".$items[$i][3]."</button>");
      }else{
        print("<button  onclick=\"buy(&#34;". $items[$i][1] ."&#34;, &#34;".$items[$i][0]."&#34;)\">BUY: ".$items[$i][3]."</button>");
      }
    print("</div></div>");

  }

 ?>
