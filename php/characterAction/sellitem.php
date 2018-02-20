<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $character = $_COOKIE["char"];
  $itemID =(int) $_GET["item"];
  $quantity =(int) $_GET["q"];

  include("../utils/dbConfig.php");
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  $newQuantity = $quantity-1;
  $sellprice = $connection->query("SELECT sell FROM `item` WHERE `item`.itemID = $itemID");
  echo $connection->error;
  $decrementQuantity = "UPDATE `inventory` SET `quantity` = \"$newQuantity\" WHERE `inventory`.characterID = \"$character\" AND `inventory`.itemID = \"$itemID\"";
  $deleteItem = "DELETE FROM `inventory` WHERE `inventory`.characterID = \"$character\" AND `inventory`.itemID = \"$itemID\"";
  $getGold = "SELECT gold FROM `character_identifier` WHERE characterID = \"$character\"";
  $getSell = "SELECT sell FROM `item` WHERE itemID = \"$itemID\"";
  $newCurrency = 0;
  $gold = 0;
  $sell = 0;
  $transactionCompleted = FALSE;
  if($quantity == 1){
      $result = $connection->query($deleteItem);
    if($result == TRUE){

      $transactionCompleted = TRUE;
    }else echo $connection->error;
  }else if($quantity > 1){
    $result = $connection->query($decrementQuantity);
    if($result){
      $transactionCompleted = TRUE;
    }else echo "decrementig error:" . $connection->error;
  };

  $result = $connection->query($getGold);
  $row = $result->fetch_assoc();
  $gold =(int) $row["gold"];


  $result = $connection->query($getSell);
  $row = $result->fetch_assoc();
  $sell =(int) $row["sell"];


  $newCurrency = $gold + $sell;

  $monetize = "UPDATE `character_identifier` SET gold = \"$newCurrency\" WHERE `character_identifier`.characterID = \"$character\"";

  if($transactionCompleted){
    $result = $connection->query($monetize);
    if($result){
      echo "TRUE";
    }
  }

?>
