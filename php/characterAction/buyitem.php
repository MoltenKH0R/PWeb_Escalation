<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $character = $_COOKIE["char"];
  $itemID = $_GET["item"];

  include('..//utils/dbConfig.php');
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $quantity = 0;
  $gold = 0;
  $cost = 0;

  $getPresent = "SELECT quantity FROM inventory WHERE characterID = \"$character\" AND itemID = \"$itemID\"";

  $getGold = "SELECT gold FROM character_identifier WHERE characterID = \"$character\"";
  $getCost = "SELECT buy FROM item WHERE itemID = \"$itemID\"";

  $addItem = "INSERT INTO inventory (characterID, itemID, quantity) VALUES (\"$character\", \"$itemID\", \"1\")";



  $result = $connection->query($getGold);
  $row = $result->fetch_assoc();
  $gold = $row["gold"];

  $result = $connection->query($getCost);
  $row = $result->fetch_assoc();
  $cost = $row["buy"];

  $gold = $gold - $cost;

    $updateGold = "UPDATE character_identifier SET gold = \"$gold\" WHERE characterID = \"$character\"";

  $result = $connection->query($getPresent);
  if($result->num_rows > 0 ){
    $row = $result->fetch_assoc();
    $quantity =(int) $row["quantity"];
    $quantity +=1;
    $increaseQuantity = "UPDATE inventory SET quantity = \"$quantity\" WHERE itemID = \"$itemID\" AND characterID = \"$character\"";
    $result = $connection->query($increaseQuantity);
    $result = $connection->query($updateGold);

    echo "TRUE";
  }else {
    $result = $connection->query($addItem);
    $result = $connection->query($updateGold);

    echo "TRUE";
  }

 ?>
