<!DOCTYPE html>
<html>
<?php
include "init.php";

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<head>

  <link href="style/style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="/images/img/favicon.ico">
  <title>INFORMATION of MANAGEMENT PC's</title>
  <meta charset="UTF-8">

</head>

<body class="bodyMan">
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



  <div class="searchbox">

    <form id="search" class="search" action="" method="post">
      <input id="inputSearch" type="text" placeholder="Search..." name="inputSearch">

      <span id="btnsearch">
        <i type class="bi bi-search"></i>
      </span>

    </form>
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

  <!-- part1 -->

  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Managment unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='Managment' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

              foreach ($list_hardware as $hardware) {
                foreach ($product_array as $product) {
  
                  if ($product['id'] == $row[$hardware]) {
                    $product_name = $product['name'];
                    break;
                  }
                }
                $hardware_name[$hardware] = $product_name;
              }


              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=managment'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='Managment.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Managment";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='Managment' && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=managment'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='Managment.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>


  <!-- part2 -->

  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Informatics unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='Informatics' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

              foreach ($list_hardware as $hardware) {
                foreach ($product_array as $product) {
  
                  if ($product['id'] == $row[$hardware]) {
                    $product_name = $product['name'];
                    break;
                  }
                }
                $hardware_name[$hardware] = $product_name;
              }


              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=Informatics'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='Informatics.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Informatics";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='Informatics'  && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=Informatics'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='Informatics.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>

  <!-- part3 -->


  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Engineering unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='Engineering' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

              foreach ($list_hardware as $hardware) {
                foreach ($product_array as $product) {
  
                  if ($product['id'] == $row[$hardware]) {
                    $product_name = $product['name'];
                    break;
                  }
                }
                $hardware_name[$hardware] = $product_name;
              }


              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=Engineering'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='Engineering.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Managment";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='Engineering'  && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=Engineering'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='Engineering.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>

  <!-- part4 -->

  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Logistic unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='Logistic' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

           foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=Logistic'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='Logistic.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Managment";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='Logistic'  && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=Logistic'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='Logistic.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>

  <!-- part5 -->

  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Production unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='Production' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

              foreach ($list_hardware as $hardware) {
                foreach ($product_array as $product) {
  
                  if ($product['id'] == $row[$hardware]) {
                    $product_name = $product['name'];
                    break;
                  }
                }
                $hardware_name[$hardware] = $product_name;
              }

              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=Production'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='Production.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Managment";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='Production'  && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=Production'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='Production.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>

  <!-- part6 -->

  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Official unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='Official' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

              foreach ($list_hardware as $hardware) {
                foreach ($product_array as $product) {
  
                  if ($product['id'] == $row[$hardware]) {
                    $product_name = $product['name'];
                    break;
                  }
                }
                $hardware_name[$hardware] = $product_name;
              }


              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=Official'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='Official.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Managment";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='Official'  && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=Official'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='Official.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>

  <!-- part7 -->

  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the EquipmentProduction unit </h2>

    </div>
    <br>


    <table>

      <tr>
        <th>Person Name</th>
        <th>IP Address</th>
        <th>Main Board</th>
        <th>CPU</th>
        <th>VGA</th>
        <th>RAM</th>
        <th>HDD</th>
        <th>Opration System</th>
        <th>Mouse</th>
        <th>KeyBouard</th>
        <th>Monitor</th>
        <th>Edit/Delete</th>

      </tr>




      <?php



      $conn = new mysqli($serverName, $userName, $password, $dbName);
      $sql_q = "SELECT * FROM `product`";
      $result = $conn->query($sql_q);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $product_array[$i] = array();
          $product_array[$i]['id'] = $row['id'];
          $product_array[$i]['name'] = $row['name'];
          $product_array[$i]['type'] = $row['type'];
          $product_array[$i]['score'] = $row['score'];
          $i++;
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['method'])) {

          $method = $_GET['method'];
          if ($method == "delete") {
            $id = $_GET['id'];

            $sql = "DELETE FROM `accessories` WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
              $msg = "<h3 class='msgs'>Your selected information has been successfully deleted.</h3>";
            } else {
              $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
            }
          }
        }
      }



      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['inputSearch']) && $_POST['inputSearch'] != "") {

          $inputSeach = $_POST['inputSearch'];
          $sql_q = "SELECT * FROM `accessories` where department='EquipmentProduction' &&  user_fullname like '$inputSeach%'  && reg_username='$user_acount'";


          // echo $sql_q;

          $result = $conn->query($sql_q);




          if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while ($row = $result->fetch_assoc()) {

              $person_id = $row['id'];
              $personName = $row['user_fullname'];
              $ipAddress =  $row['ipAddress'];
              $mainBoard_id = $row['mainBoard'];

              $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
              $hardware_name = [];

              foreach ($list_hardware as $hardware) {
                foreach ($product_array as $product) {
  
                  if ($product['id'] == $row[$hardware]) {
                    $product_name = $product['name'];
                    break;
                  }
                }
                $hardware_name[$hardware] = $product_name;
              }


              $mainBoard = $hardware_name['mainBoard'];
              $cpu =  $hardware_name['cpu'];
              $vga = $hardware_name['VGA'];
              $ram = $hardware_name['RAM'];
              $hdd = $hardware_name['HDD'];
              $oprationSystem = $hardware_name['Opration_System'];
              $mouse = $hardware_name['Mouse'];
              $keyBoard = $hardware_name['KeyBouard'];
              $monitor = $hardware_name['Monitor'];

              echo "<tr>\n";
              echo "<th>$personName</th>\n";
              echo "<th>$ipAddress</th>\n";
              echo "<th>$mainBoard</th>\n";
              echo "<th>$cpu</th>\n";
              echo "<th>$vga</th>\n";
              echo "<th>$ram</th>\n";
              echo "<th>$hdd</th>\n";
              echo "<th>$oprationSystem</th>\n";
              echo "<th>$mouse</th>\n";
              echo "<th>$keyBoard</th>\n";
              echo "<th>$monitor</th>\n";
              echo "<th>\n";
              echo "<a href='edit.php?id=$person_id&method=edit&ref=EquipmentProduction'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
              echo "<a href='EquipmentProduction.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
              echo "</th>\n";
              echo "</tr>\n";

              $i++;
            }
          }
        } else if (isset($_POST['fname'])) {
          $fname = $_POST['fname'];
          $iplocal = $_POST['iplocal'];
          $MainbordList = $_POST['MainbordList'];
          $CpuList = $_POST['CpuList'];
          $VGAList = $_POST['VGAList'];
          $RAMList = $_POST['RAMList'];
          $HDDList = $_POST['HDDList'];
          $OsList = $_POST['OsList'];
          $MouseList = $_POST['MouseList'];
          $keyBoardList = $_POST['keyBoardList'];
          $MonitorList = $_POST['MonitorList'];
          $department = "Managment";



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department')";

          // echo $sql;
          if (mysqli_query($conn, $sql)) {
            $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
          } else {
            $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
          }
        }
      }


      if (!isset($_POST['inputSearch']) || $_POST['inputSearch'] == "") {
        $sql_q = "SELECT * FROM `accessories` where department='EquipmentProduction'  && reg_username='$user_acount'";
        $result = $conn->query($sql_q);




        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];

            $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            $hardware_name = [];

            foreach ($list_hardware as $hardware) {
              foreach ($product_array as $product) {

                if ($product['id'] == $row[$hardware]) {
                  $product_name = $product['name'];
                  break;
                }
              }
              $hardware_name[$hardware] = $product_name;
            }


            $mainBoard = $hardware_name['mainBoard'];
            $cpu =  $hardware_name['cpu'];
            $vga = $hardware_name['VGA'];
            $ram = $hardware_name['RAM'];
            $hdd = $hardware_name['HDD'];
            $oprationSystem = $hardware_name['Opration_System'];
            $mouse = $hardware_name['Mouse'];
            $keyBoard = $hardware_name['KeyBouard'];
            $monitor = $hardware_name['Monitor'];

            echo "<tr>\n";
            echo "<th>$personName</th>\n";
            echo "<th>$ipAddress</th>\n";
            echo "<th>$mainBoard</th>\n";
            echo "<th>$cpu</th>\n";
            echo "<th>$vga</th>\n";
            echo "<th>$ram</th>\n";
            echo "<th>$hdd</th>\n";
            echo "<th>$oprationSystem</th>\n";
            echo "<th>$mouse</th>\n";
            echo "<th>$keyBoard</th>\n";
            echo "<th>$monitor</th>\n";
            echo "<th>\n";
            echo "<a href='edit.php?id=$person_id&method=edit&ref=EquipmentProduction'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
            echo "<a href='EquipmentProduction.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>






    </table>
    <br>
  </div>

  <?php

  if (isset($msg)) {
    echo $msg;
  }

  mysqli_close($conn);
  ?>











  </div>

  <script src="js/app.js"></script>
</body>

</html>