<!DOCTYPE html>
<html>
<?php
include "init.php";

?>

<head>

  <link href="style/style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="/images/img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INFORMATION of MANAGEMENT PC's</title>
  <meta charset="UTF-8">

</head>

<body class="bodyLogin">
  <div id="mySidenav" class="sidenav">
    <?php
    if (isset($user_acount)) {

      echo "<div id='username'>Hi $user_acount </div>";
      echo "<hr>";
    }
    ?>
    <a href="#" class="closebtn">&times;</a>
    <a href="index.php">HOME</a>
    <?php
    if (isset($user_acount)) {
      echo "<a href='Logout.php'>LOGOUT</a>";
    } else {
      echo "<a href='Login.php'>LOGIN</a>";
    }
    ?>
    <a href="About.php">ABOUT</a>
    <hr>
    <a href="Managment.php">Managment</a>
    <a href="Informatics.php">Informatics</a>
    <a href="Engineering.php">Engineering</a>
    <a href="Logistic.php">Logistic</a>
    <a href="Production.php">Production</a>
    <a href="Official.php">Official</a>
    <a href="EquipmentProduction.php">EquipmentProduction</a>
    <a href="Quallity.php">Quallity</a>
    <a href="all.php">All</a>



  </div>

  <div id="main">

    <span id="menubtn" style="font-size:25px;cursor:pointer">&#9776; MENU</span>
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.body.style.backgroundColor = "white";
    }
  </script>

  <div class="timeline">
    <div class="container1 left">
      <div class="content">
        <h2>2023</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
    <div class="container1 right">
      <div class="content">
        <h2>2020</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
    <div class="container1 left">
      <div class="content">
        <h2>2017</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
    <div class="container1 right">
      <div class="content">
        <h2>2014</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
    <div class="container1 left">
      <div class="content">
        <h2>2011</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
    <div class="container1 right">
      <div class="content">
        <h2>2007</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
    <div class="container1 left">
      <div class="content">
        <h2>2004</h2>
        <p>there will be a little about story of BalinTech Company</p>
      </div>
    </div>
  </div>



  <script src="js/app.js"></script>
</body>

</html>