<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $character = $_COOKIE["char"];
  $itemID =(int) $_GET["item"];
  $category = $_GET["c"];
  include("../utils/dbConfig.php");
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
  $itemEquipped = NULL;
  $getEquipped = "SELECT itemID FROM equip WHERE characterID = \"$character\" AND slot = \"$category\"";
  $result = $connection->query($getEquipped);
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $itemEquipped =(int) $row["itemID"];
    $result = $connection->query("SELECT quantity FROM inventory WHERE itemID = \"$itemEquipped\" AND characterID = \"$character\"");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $inventoryQuantity =(int) $row["quantity"];
      $inventoryQuantity += 1;
      $result = $connection->query("UPDATE inventory SET quantity = \"$inventoryQuantity\" WHERE characterID = \"$character\" AND itemID = \"$itemEquipped\"");
    }else {
      $result = $connection->query("INSERT INTO inventory (characterID, itemID, quantity) VALUES (\"$character\", \"$itemEquipped\", \"1\")");
    }
    $result = $connection->query("DELETE FROM equip WHERE characterID = \"$character\" AND itemID = \"$itemEquipped\"");
  }
  $result = $connection->query("INSERT INTO equip (characterID, itemID, slot) VALUES (\"$character\", \"$itemID\", \"$category\")");
  if($result){
    $result = $connection->query("SELECT quantity FROM inventory WHERE characterID = \"$character\" AND itemID = \"$itemID\"");
    $row = $result->fetch_assoc();
    $inventoryQuantity =(int) $row ["quantity"];
    if($inventoryQuantity > 1){
      $inventoryQuantity -= 1;
      $result = $connection->query("UPDATE inventory SET quantity = \"$inventoryQuantity\" WHERE characterID = \"$character\" AND itemID = \"$itemID\"");
    }else{
      $result = $connection->query("DELETE FROM inventory WHERE characterID = \"$character\" AND itemID = \"$itemID\"");
    }
  //  echo "TRUE";
  }

//lets update some STATS
  $itemlvl = 0;
  $health = 0;
  $atkpw = 0;
  $defencertg = 0;
  $dodge = 0;
  $critichance = 0;
  $criticalstk = 0;

  $getStats = "SELECT * FROM equip JOIN (item) ON (`item`.itemID = `equip`.itemID AND `equip`.characterID = \"$character\")";

  $result = $connection->query($getStats);
  while($row = $result->fetch_assoc()){
    $itemlvl += (int) $row["itemlvl"];
    $health += (int) $row["health"];
    $atkpw += (int) $row["atkpw"];
    $defencertg += (float) $row["defencertg"];
    $dodge += (int) $row["dodge"];
    $critichance += (float) $row["critichance"];
    $criticalstk += (int) $row["criticalstk"];
  }

  $itemlvl = $itemlvl/12;

  $updateStats = "UPDATE character_identifier SET health = \"$health\", atkpw = \"$atkpw\", defencertg = \"$defencertg\", dodge = \"$dodge\", critchance = \"$critichance\", criticalstk = \"$criticalstk\", itemlvl = \"$itemlvl\" WHERE characterID = \"$character\"";

  $result = $connection->query($updateStats);

  if($result){
    echo "TRUE";
  }else {
    echo $connection->error;
  }


?>
