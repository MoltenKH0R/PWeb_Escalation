<!DOCTYPE html>
<?php $user = $_GET["user"]; ?>
<html>
<head>
  <title>NEW CHARACTER</title>
  <link type="text/css" rel="stylesheet" href="../../styles/create-char.css">
  <link type="text/css" rel="stylesheet" href="../../styles/main.css">
</head>
<body>
  <div class="top-bar">
    <h1>NEW CHARACTER</h1>
  </div>
  <div class="namespace">
    <h3>FACTION</h3>
    <h3>RACE</h3>
    <h3>CLASS</h3>
  </div>
  <div id="faction-tab">
    <button class="selection-button" onclick="raceLoader(&#34;Alliance&#34;);setFaction(&#34;Alliance&#34;);">Alliance</button>
    <button class="selection-button" onclick="raceLoader(&#34;Horde&#34;);setFaction(&#34;Horde&#34;);">Horde</button>
  </div>
  <div id="race-tab">
  </div>
  <div id="class-tab">
  </div>
  <div id="name-tab">
    <input id="name-field" type="text" name="charname" placeholder="Character Name" onchange="checkUserExistance()">
    <p id="checkText" style="visibility: hidden; color: red;">Username Unavailable</p>
  </div>
  <div id="confirm-tab">
    <button onclick="complete()">CREATE</button>
  </div>
</body>
<script>
  var faction, race, classe, available, name;
  function setFaction(data){faction = data; console.log(faction);};
  function setRace(data){race = data; console.log(race);};
  function setClass(data){classe = data; console.log(classe);};
  function complete(){
    if(available){
      window.open("insert-new-char.php?faction="+faction+"&race="+race+"&class="+classe+"&charname="+name+"&user=<?php echo $user ?>", "_self");
    }
  };
  function raceLoader(req){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("race-tab").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET","creation-loader.php?selection="+req+"&loader=race", true);
    xhttp.send();
  };
  function classLoader(req){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("class-tab").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET","creation-loader.php?selection="+req+"&loader=class", true);
    xhttp.send();
  };
  function checkUserExistance(){
    var username = document.getElementById("name-field").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        if(this.responseText == "TRUE"){
            document.getElementById("checkText").style.visibility = "visible";
            available = false;
        }else {
              document.getElementById("checkText").style.visibility = "hidden";
            name = username;
            available = true;
        }

      }
    };
    xhttp.open("GET","../utils/findchar.php?user="+username, true);
    xhttp.send();
  }
</script>
</html>
