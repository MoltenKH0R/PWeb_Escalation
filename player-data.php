<?php
  $username = $_COOKIE['user'];
  $character = $_COOKIE['char'];
?>
<!DOCTYPE html>
<head>

<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/tab-selector.css" type="text/css" rel="stylesheet">
<link href="styles/tab-selector.css" type="text/css" rel="stylesheet">

</head>
<body onload="loadPlayerData(&#34;character&#34;)">
  <div id="tab-selector">
    <input type="button" value="CHARACTER" onclick="loadPlayerData(&#34;character&#34;)">
    <input type="button" value="STATS" onclick="loadPlayerData(&#34;stats&#34;)">
    <input type="button" value="INVENTORY" onclick="loadPlayerData(&#34;inventory&#34;)">
    <input type="button" value="PVP" onclick="loadPlayerData(&#34;pvp-stats&#34;)">
  </div>
  <div class="separator">
  </div>
  <div id="data-container">
  </div>

</body>
<script>
  function loadPlayerData(req){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("data-container").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "php/characterInfo/" + req + ".php", true);
    xhttp.send();
  };

  function sellItem(id, quantity){
    if(confirm("Are you shure you want to delete this itme?")){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          if(this.responseText=="TRUE"){
            location.reload();
          }
        }
      }
      xhttp.open("GET", "php/characterAction/sellitem.php?item="+id+"&q="+quantity, true);
      xhttp.send();
    }
  }

  function equipItem(id, category){
    if(confirm("Are you sure you want to equip this "+category +" ?")){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          if(this.responseText == "TRUE"){
            location.reload();
          }
        }
      }
      xhttp.open("GET", "php/characterAction/equipitem.php?item="+id+"&c="+category, true);
      xhttp.send();
    }
  }
</script>
