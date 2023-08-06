<!DOCTYPE html>
<?php
include "init.php";

?>

<head>

  <link href="style/style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="/images/img/favicon.ico">
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



  <div class="vorood">
    <h2>Click To Login</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username_input = $_POST["username"];
      $password_input = $_POST["password"];


      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `users` where username='$username_input' && password='$password_input'";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row

        $cookie_name = "user";
        $cookie_value = $username_input;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        echo "<p>You are logged in Account</p>";
        sleep(2);
        header("Location: index.php");

  
      }

    }
    ?>


    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">

      <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        </div>

        <div class="container">

          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>

          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>



        </div>

        <div class="container" style="background-color:#ffffff">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
    </div>

    <script>
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>



    <script src="js/app.js"></script>
</body>

</html>