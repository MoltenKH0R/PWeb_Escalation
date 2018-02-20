<?php
$username = $_COOKIE["user"];
$character = $_COOKIE["char"];
?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/tab-selector.css" type="text/css" rel="stylesheet">
<body onload="loadShopSection(&#34;head&#34;)">
  <div id="tab-selector">
    <input type="button" value="HELM" onclick="loadShopSection(&#34;head&#34;)">
    <input type="button" value="SHOULDERS" onclick="loadShopSection(&#34;shoulders&#34;)">
    <input type="button" value="CHEST" onclick="loadShopSection(&#34;chest&#34;)">
    <input type="button" value="HANDS" onclick="loadShopSection(&#34;hands&#34;)">
    <input type="button" value="LEGS" onclick="loadShopSection(&#34;legs&#34;)">
    <input type="button" value="FEET" onclick="loadShopSection(&#34;feet&#34;)">
    <input type="button" value="WAIST" onclick="loadShopSection(&#34;waist&#34;)">
    <input type="button" value="WRIST" onclick="loadShopSection(&#34;wrist&#34;)">
    <input type="button" value="NECK" onclick="loadShopSection(&#34;neck&#34;)">
    <input type="button" value="RING" onclick="loadShopSection(&#34;ring&#34;)">
    <input type="button" value="MAIN" onclick="loadShopSection(&#34;main&#34;)">
    <input type="button" value="OFF" onclick="loadShopSection(&#34;off&#34;)">
  </div>
  <div class="separator">
  </div>
  <div id="data-container">
  </div>

</body>
<script>
function loadShopSection(req){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("data-container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","shop-page.php?category="+req, true);
  xhttp.send();
};

function buy(name, item){
  if(confirm("Vuoi acquistare "+ name +" ?")){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        if(this.responseText == "TRUE"){
            location.reload();
        }
      }
    }
    xhttp.open("GET", "php/characterAction/buyitem.php?item="+ item);
    xhttp.send();
  }
}

</script>
