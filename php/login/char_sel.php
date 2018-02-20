<?php
  if(isset($_COOKIE["char"]) && isset($_COOKIE["user"])){
    header("Location: ../../home.php");
  }
  if(!isset($_COOKIE["user"])){
    header("Location: login.php");
  }else{
    $username = $_COOKIE["user"];
  }

  include('../utils/dbConfig.php');


  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
  $get_characters = "SELECT `characterID` FROM `character_identifier` WHERE `userID` = \"$username\"";

  $result = $connection->query($get_characters);
  $character = array();
  if($result->num_rows > 0){
    $i = 0;
    while($row = $result->fetch_assoc()){
      $character[$i] = $row["characterID"];
      $i++;
    }

  }else {echo "ERROR: " . $connection->error;}

 print("
 <html>
   <head>
     <title>Character Selection</title>
     <link href=\"../../styles/main.css\" rel=\"stylesheet\" type=\"text/css\">
     <link href=\"../../styles/char-sel.css\" rel=\"stylesheet\" type=\"text/css\">
     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
   </head>
   <body>
     <div id=\"title-tab\">
       <h1>SELECT A CHARACTER</h1>
     </div>
     <div id=\"list-container\">
      ");

      for($k=0; $k<sizeof($character); $k++){
        print("<button type=\"button\" class=\"createnew\" name=\"button\" onclick=\"loadChar(&#34;".$character[$k]."&#34;)\">".$character[$k]."</button>");
      }
      if(sizeof($character)<8){
        print("<button type=\"button\" name=\"button\" onclick=\"gotocreate()\">+</button>");
      }
      print("
     </div>
     <div id=\"player-container\">
     </div>
   </body>
   <script>
    function loadgame(character){
      window.open(\"savechar.php?char=\"+character);
    };
     function gotocreate(){window.open(\"../characterAction/create-char.php?user=". $username."\", \"_self\")};
     function loadChar(req){
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
           document.getElementById(\"player-container\").innerHTML = this.responseText;
       }

       }
       xhttp.open(\"GET\", \"login-char-view.php?char=\"+req+\"&user=".$username."\", true);
       xhttp.send();
     };

     function deleteChar(req){
      if(confirm(\"are you sure you want to delete \"+req+\" ?\")){
        window.open(\"../characterAction/deletechar.php?char=\"+req+\"&user=".$username."\", \"_self\");
      }

     }
   </script>
 </html>");
?>
