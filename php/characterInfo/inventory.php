<link href="styles/inventory.css" type="text/css" rel="stylesheet">
<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $username = $_COOKIE['user'];
  $character = $_COOKIE["char"];

  include("../utils/dbConfig.php");
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
  $getInventory = "SELECT * FROM inventory JOIN (item) ON (`item`.itemID = `inventory`.itemID AND `inventory`.characterID = \"$character\")";

  $item = array();

  $result = $connection->query($getInventory);

  if($result->num_rows > 0 ){
    $i = 0;
    while($row = $result->fetch_assoc()){
      $item[$i][0] = (int) $row["itemID"];
      $item[$i][1] = (int) $row["quantity"];
      $item[$i][2] = (string) $row["name"];
      $item[$i][3] = (int) $row["itemlvl"];
      $item[$i][4] = (int) $row["health"];
      $item[$i][5] = (int) $row["atkpw"];
      $item[$i][6] = (float) $row["defencertg"];
      $item[$i][7] = (int) $row["dodge"];
      $item[$i][8] = (float) $row["critichance"];
      $item[$i][9] = (int) $row["criticalstk"];
      $item[$i][10]= (int) $row["buy"];
      $item[$i][11]= (int) $row["sell"];
      $item[$i][12]= (string) $row["category"];
      $item[$i][13]= (int) $row["levelreq"];
      $i++;
    }
  }

  $maxInventory = 20;
 ?>






<?php
  for($i = 0; $i<sizeof($item); $i++){
    print("<div class=\"inventory-item\">
      <img src=\"images/item.png\">
      <div class=\"item-primary-i\">
        <p>" . $item[$i][2] . "</p>
        <h6>" . $item[$i][3] . "</h6>
        <h4>" . $item[$i][12] . "</h4>
        <h6>EQUIP-LVL: " . $item[$i][13] . "</h6>
      </div>
      <div class=\"item-stat-i\">
        <p>Quantity: " . $item[$i][1] . "</p>
        <h4>Health: " . $item[$i][4] . "</h4>

      </div>
      <div class=\"item-sell\">
      <button onclick=\"sellItem(".$item[$i][0].", ".$item[$i][1].")\">SELL ".$item[$i][11]." G</button>
      <button onclick=\"equipItem(".$item[$i][0].", &#39;".$item[$i][12]."&#39;)\">EQUIP</button>

      </div>
    </div>");

  }

 ?>
