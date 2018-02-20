<?php
  if(!isset($_COOKIE["char"])){
    header("Location: php/login/login.php");
  }
  $username = $_COOKIE['user'];
  $characterID = $_COOKIE['char'];
  include('../utils/dbConfig.php');
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);


  $getHead =      "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"head\")";
  $getShoulders = "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"shoulders\")";
  $getChest =     "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"chest\")";
  $getHands =     "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"hands\")";
  $getLegs =      "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"legs\")";
  $getFeet =      "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"feet\")";
  $getWaist =     "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"waist\")";
  $getWrist =     "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"wrist\")";
  $getNeck =      "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"neck\")";
  $getRing =      "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"ring\")";
  $getMain =      "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"main\")";
  $getOff =       "SELECT * FROM equip  JOIN (item) ON (`equip`.itemID = `item`.itemID AND `equip`.characterID = \"$characterID\" AND `equip`.slot = \"off\")";

  $Head = array();
  $shoulders = array();
  $chest = array();
  $hands = array();
  $legs = array();
  $feet = array();
  $waist = array();
  $wrist = array();
  $neck = array();
  $ring = array();
  $main = array();
  $off = array();

  $resultHead = $connection->query($getHead);
  if($resultHead->num_rows > 0){
    while($row = $resultHead->fetch_assoc()){
      $Head[0] =(int) $row["itemID"];
      $Head[1] =(string) $row["name"];
      $Head[2] =(int) $row["itemlvl"];
      $Head[3] =(int) $row["health"];
      $Head[4] =(int) $row["atkpw"];
      $Head[5] =(float) $row["defencertg"];
      $Head[6] =(int) $row["dodge"];
      $Head[7] =(float) $row["critichance"];
      $Head[8] =(int) $row["criticalstk"];
      $Head[9] =(int) $row["buy"];
      $Head[10] =(int) $row["sell"];
      $Head[11] =(string) $row["slot"];
    }
  }else $Head = NULL;

  $resultShoulders = $connection->query($getShoulders);
  if($resultShoulders->num_rows > 0){
    while($row = $resultShoulders->fetch_assoc()){
      $shoulders[0] =(int) $row["itemID"];
      $shoulders[1] =(string) $row["name"];
      $shoulders[2] =(int) $row["itemlvl"];
      $shoulders[3] =(int) $row["health"];
      $shoulders[4] =(int) $row["atkpw"];
      $shoulders[5] =(float) $row["defencertg"];
      $shoulders[6] =(int) $row["dodge"];
      $shoulders[7] =(float) $row["critichance"];
      $shoulders[8] =(int) $row["criticalstk"];
      $shoulders[9] =(int) $row["buy"];
      $shoulders[10] =(int) $row["sell"];
      $shoulders[11] =(string) $row["slot"];
    }
  }else $shoulders = NULL;

  $result = $connection->query($getChest);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $chest[0] =(int) $row["itemID"];
      $chest[1] =(string) $row["name"];
      $chest[2] =(int) $row["itemlvl"];
      $chest[3] =(int) $row["health"];
      $chest[4] =(int) $row["atkpw"];
      $chest[5] =(float) $row["defencertg"];
      $chest[6] =(int) $row["dodge"];
      $chest[7] =(float) $row["critichance"];
      $chest[8] =(int) $row["criticalstk"];
      $chest[9] =(int) $row["buy"];
      $chest[10] =(int) $row["sell"];
      $chest[11] =(string) $row["slot"];
    }
  }else $chest = NULL;

  $result = $connection->query($getHands);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $hands[0] =(int) $row["itemID"];
      $hands[1] =(string) $row["name"];
      $hands[2] =(int) $row["itemlvl"];
      $hands[3] =(int) $row["health"];
      $hands[4] =(int) $row["atkpw"];
      $hands[5] =(float) $row["defencertg"];
      $hands[6] =(int) $row["dodge"];
      $hands[7] =(float) $row["critichance"];
      $hands[8] =(int) $row["criticalstk"];
      $hands[9] =(int) $row["buy"];
      $hands[10] =(int) $row["sell"];
      $hands[11] =(string) $row["slot"];
    }
  }else $hands = NULL;

  $result = $connection->query($getLegs);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $legs[0] =(int) $row["itemID"];
      $legs[1] =(string) $row["name"];
      $legs[2] =(int) $row["itemlvl"];
      $legs[3] =(int) $row["health"];
      $legs[4] =(int) $row["atkpw"];
      $legs[5] =(float) $row["defencertg"];
      $legs[6] =(int) $row["dodge"];
      $legs[7] =(float) $row["critichance"];
      $legs[8] =(int) $row["criticalstk"];
      $legs[9] =(int) $row["buy"];
      $legs[10] =(int) $row["sell"];
      $legs[11] =(string) $row["slot"];
    }
  }else $legs = NULL;

  $result = $connection->query($getFeet);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $feet[0] =(int) $row["itemID"];
      $feet[1] =(string) $row["name"];
      $feet[2] =(int) $row["itemlvl"];
      $feet[3] =(int) $row["health"];
      $feet[4] =(int) $row["atkpw"];
      $feet[5] =(float) $row["defencertg"];
      $feet[6] =(int) $row["dodge"];
      $feet[7] =(float) $row["critichance"];
      $feet[8] =(int) $row["criticalstk"];
      $feet[9] =(int) $row["buy"];
      $feet[10] =(int) $row["sell"];
      $feet[11] =(string) $row["slot"];
    }
  }else $feet = NULL;

  $result = $connection->query($getWaist);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $waist[0] =(int) $row["itemID"];
      $waist[1] =(string) $row["name"];
      $waist[2] =(int) $row["itemlvl"];
      $waist[3] =(int) $row["health"];
      $waist[4] =(int) $row["atkpw"];
      $waist[5] =(float) $row["defencertg"];
      $waist[6] =(int) $row["dodge"];
      $waist[7] =(float) $row["critichance"];
      $waist[8] =(int) $row["criticalstk"];
      $waist[9] =(int) $row["buy"];
      $waist[10] =(int) $row["sell"];
      $waist[11] =(string) $row["slot"];
    }
  }else $waist = NULL;

  $result = $connection->query($getWrist);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $wrist[0] =(int) $row["itemID"];
      $wrist[1] =(string) $row["name"];
      $wrist[2] =(int) $row["itemlvl"];
      $wrist[3] =(int) $row["health"];
      $wrist[4] =(int) $row["atkpw"];
      $wrist[5] =(float) $row["defencertg"];
      $wrist[6] =(int) $row["dodge"];
      $wrist[7] =(float) $row["critichance"];
      $wrist[8] =(int) $row["criticalstk"];
      $wrist[9] =(int) $row["buy"];
      $wrist[10] =(int) $row["sell"];
      $wrist[11] =(string) $row["slot"];
    }
  }else $wrist = NULL;

  $result = $connection->query($getNeck);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $neck[0] =(int) $row["itemID"];
      $neck[1] =(string) $row["name"];
      $neck[2] =(int) $row["itemlvl"];
      $neck[3] =(int) $row["health"];
      $neck[4] =(int) $row["atkpw"];
      $neck[5] =(float) $row["defencertg"];
      $neck[6] =(int) $row["dodge"];
      $neck[7] =(float) $row["critichance"];
      $neck[8] =(int) $row["criticalstk"];
      $neck[9] =(int) $row["buy"];
      $neck[10] =(int) $row["sell"];
      $neck[11] =(string) $row["slot"];
    }
  }else $neck = NULL;

  $result = $connection->query($getRing);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $ring[0] =(int) $row["itemID"];
      $ring[1] =(string) $row["name"];
      $ring[2] =(int) $row["itemlvl"];
      $ring[3] =(int) $row["health"];
      $ring[4] =(int) $row["atkpw"];
      $ring[5] =(float) $row["defencertg"];
      $ring[6] =(int) $row["dodge"];
      $ring[7] =(float) $row["critichance"];
      $ring[8] =(int) $row["criticalstk"];
      $ring[9] =(int) $row["buy"];
      $ring[10] =(int) $row["sell"];
      $ring[11] =(string) $row["slot"];
    }
  }else $ring = NULL;

  $result = $connection->query($getMain);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $main[0] =(int) $row["itemID"];
      $main[1] =(string) $row["name"];
      $main[2] =(int) $row["itemlvl"];
      $main[3] =(int) $row["health"];
      $main[4] =(int) $row["atkpw"];
      $main[5] =(float) $row["defencertg"];
      $main[6] =(int) $row["dodge"];
      $main[7] =(float) $row["critichance"];
      $main[8] =(int) $row["criticalstk"];
      $main[9] =(int) $row["buy"];
      $main[10] =(int) $row["sell"];
      $main[11] =(string) $row["slot"];
    }
  }else $main = NULL;

  $result = $connection->query($getOff);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $off[0] =(int) $row["itemID"];
      $off[1] =(string) $row["name"];
      $off[2] =(int) $row["itemlvl"];
      $off[3] =(int) $row["health"];
      $off[4] =(int) $row["atkpw"];
      $off[5] =(float) $row["defencertg"];
      $off[6] =(int) $row["dodge"];
      $off[7] =(float) $row["critichance"];
      $off[8] =(int) $row["criticalstk"];
      $off[9] =(int) $row["buy"];
      $off[10] =(int) $row["sell"];
      $off[11] =(string) $row["slot"];
    }
  }else $off = NULL;

?>
<link href="styles/character.css" type="text/css" rel="stylesheet">


  <div id="left-panel">
    <div class="item-pane-l" id="head">
      <img src="images/item.png">
      <p><?php echo $Head[1] ?></p><br>
      <h6><?php echo $Head[2] ?></h6>
    </div>
    <div class="item-pane-l" id="shoulders">
      <img src="images/item.png">
      <p><?php echo $shoulders[1] ?></p><br>
      <h6><?php echo $shoulders[2] ?></h6>
    </div>
    <div class="item-pane-l" id="chest">
      <img src="images/item.png">
      <p><?php echo $chest[1] ?></p><br>
      <h6><?php echo $chest[2] ?></h6>
    </div>
    <div class="item-pane-l" id="hands">
      <img src="images/item.png">
      <p><?php echo $hands[1] ?></p><br>
      <h6><?php echo $hands[2] ?></h6>
    </div>
    <div class="item-pane-l" id="legs">
      <img src="images/item.png">
      <p><?php echo $legs[1] ?></p><br>
      <h6><?php echo $legs[2] ?></h6>
    </div>
    <div class="item-pane-l" id="main">
      <img src="images/item.png">
      <p><?php echo $main[1] ?></p><br>
      <h6><?php echo $main[2] ?></h6>
    </div>
  </div>

  <div id="center-panel">
    <img src="images/char.png">
  </div>

  <div id="right-panel">

    <div class="item-pane-r" id="feet">
      <img src="images/item.png">
      <p><?php echo $feet[1] ?> </p>
      <h6><?php echo $feet[2] ?></h6>
    </div>
    <div class="item-pane-r" id="waist">
      <img src="images/item.png">
      <p><?php echo $waist[1] ?></p>
      <h6><?php echo $waist[2] ?></h6>
    </div>
    <div class="item-pane-r" id="wrist">
      <img src="images/item.png">
      <p><?php echo $wrist[1] ?></p>
      <h6><?php echo $wrist[2] ?></h6>
    </div>
    <div class="item-pane-r" id="neck">
      <img src="images/item.png">
      <p><?php echo $neck[1] ?></p>
      <h6><?php echo $neck[2] ?></h6>
    </div>
    <div class="item-pane-r" id="ring">
      <img src="images/item.png">
      <p><?php echo $ring[1] ?></p>
      <h6><?php echo $ring[2] ?></h6>
    </div src="images/item.png">
    <div class="item-pane-r" id="off">
      <img src="images/item.png">
      <p><?php echo $off[1] ?></p>
      <h6><?php echo $off[2] ?></h6>
    </div>
  </div>
