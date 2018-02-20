<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $username = $_COOKIE["user"];
  $character = $_COOKIE["char"];
 ?>

<!DOCTYPE html>
<html>
<head>
  <title> Escalation - Home</title>
  <link href="styles/main.css" type="text/css" rel="stylesheet">
  <link href="styles/home.css" type="text/css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://www.w3schools.com/lib/w3.js"></script>

</head>
  <body onload="loadDoc()">


    <!-- Top bar for molten links and general account settings -->
    <div w3-include-html="php/elements/top-bar.php"></div>
    <!-- main menu bar for game links and options -->
    <div w3-include-html="php/elements/main-menu.php"></div>
    <!-- player info tab -->
    <div id="player-info"></div>
    <!-- the fun part of the page -->
    <iframe name="iframe-a" id="main-frame" align="center" src="player-data.php"></iframe>



  </body>
  <script>

    w3.includeHTML();
    var reloader = setInterval(loadDoc, 1000);
    function loadDoc(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          document.getElementById("player-info").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "php/elements/player-info.php", true);
      xhttp.send();
    }

  </script>
</html>
