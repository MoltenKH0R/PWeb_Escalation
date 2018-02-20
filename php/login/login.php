<?php
  if(isset($_COOKIE["user"])){
    header("Location: char_sel.php");
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Molten Login</title>
    <link href="../../styles/main.css" rel="stylesheet" type="text/css">
    <link href="../../styles/login.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
    <header>
      <img src="../../images/logo.png" alt="logo">
    </header>
    <body>
      <div id="error">
        <p>Username or password is invalid.</p>
      </div>
      <div class="content">
        <form method="post" target="_self" action="javascript:validateLogin()">
          <input type="email" id="email" name="email" value="" required="required" placeholder="Email"/>
          <input type="password"id="password" name="password" value="" required="required" placeholder="Password"/>
          <input type="submit" name="submit" value="Login"/>
        </form>
        <a href="../register/register.php" target="_self">Create a free Molten Account</a>
      </div>

  </body>
  <script>
    function validateLogin(){
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          if(this.responseText == "error"){
            document.getElementById("error").style.visibility = "visible";
          }else if(this.responseText){
            document.getElementById("error").style.visibility = "hidden";
              window.open("redirect.php?user="+this.responseText, "_SELF");
          }
        }
      };
      xhttp.open("POST","validate_login.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      xhttp.send("email="+email+"&password="+password);
    }
  </script>
</html>
