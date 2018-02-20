<?php
if(!isset($_COOKIE["char"])){
  header("Location: php/login/login.php");
}
  $username = $_COOKIE['user'];
  $character = $_COOKIE['char'];
 ?>
<link href="../../styles/main.css" type="text/css" rel="stylesheet">
<link href="../../styles/tab-selector.css" type="text/css" rel="stylesheet">
<link href="../../styles/istant-duel.css" type="text/css" rel="stylesheet">
<body>
  <div id="istant-header">
    <a onclick="searchMatch(&#34;<?php $character ?>&#34;)"><div class="pvp-category">
      <h2>FIND A MATCH</h2>
    </div></a>
  </div>
  <div class="separator"></div>
  <div id="duel-container">
  </div>
</body>
<script>
function searchMatch(req){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("duel-container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","istant-match.php", true);
  xhttp.send();
}

function winner(enemy){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("duel-container").innerHTML = this.responseText;
    }
  }
  xhttp.open("GET", "../characterAction/winner.php?enemy="+enemy, true);
  xhttp.send();
}
</script>
