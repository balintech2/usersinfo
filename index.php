<!DOCTYPE html>
<meta charset="utf-8">
<html>
<?php
include "init.php";

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style/style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <title>BalinTech </title>
  <meta charset="UTF-8">

</head>

<body>
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



  <div class="tableBTM">

    <a href="Managment.php">
      <div class="buttonMAIN">
        <p>MANAGEMENT</p>
      </div>
    </a>

    <a href="Informatics.php">
      <div class="buttonMAIN">
        <p>INFORMATICS</p>
      </div>
    </a>

    <a href="Engineering.php">
      <div class="buttonMAIN">
        <p>ENGINEERING</p>
      </div>
    </a>

    <div class="buttonMAIN">
      <a href="Logistic.php">
        <p>LOGISTIC</p>
      </a>
    </div>
    <a href="Quallity.php">
      <div class="buttonMAIN">
        <p>QUALLITY</p>
      </div>
    </a>
    <a href="Production.php">
      <div class="buttonMAIN">
        <p>PRODUCTION</p>
      </div>
    </a>

    <a href="Official.php">
      <div class="buttonMAIN">
        <p>OFFICIAL</p>
      </div>
    </a>

    <a href="EquipmentProduction.php">
      <div class="buttonMAIN">
        <p>EQUIPMENT PRODCTION</p>
      </div>
    </a>

    <a href="All.php">
      <div class="buttonMAIN">
        <p>ALL</p>
      </div>
    </a>

  </div>



  <script src="js/app.js"></script>
</body>

</html>