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



  <div class="boxtable">
    <div class="divheaderTable">
      <h2>Computer's information of the Engineering unit</h2>

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
              echo "<a href='edit.php?id=$person_id&method=edit&ref=managment'><img class='editDeleteRow' src='img/edit4.png' alt='Edit'></a>\n";
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
          $department = "Engineering";
          $reg_user = $user_acount;



          $sql = "INSERT INTO accessories (user_fullname, ipAddress, mainBoard,cpu,VGA,RAM,HDD,Opration_System,Mouse,KeyBouard,Monitor,department,reg_username) 
  VALUES (
      '$fname','$iplocal','$MainbordList','$CpuList','$VGAList'
      ,'$RAMList','$HDDList','$OsList','$MouseList','$keyBoardList'
      ,'$MonitorList','$department','$reg_user')";

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
            echo "<a href='Managment.php?id=$person_id&method=delete'><img class='editDeleteRow' src='img/delete.jpg' alt='Edit'></a>\n";
            echo "</th>\n";
            echo "</tr>\n";

            $i++;
          }
        }
      }







      ?>


      <form action="" method="post">
        <tr>
          <th>
            <input type="text" id="fname" name="fname" placeholder="Name" required>
          </th>
          <th>
            <input type="text" id="iplocal" name="iplocal" placeholder="IP" required>
          </th>
          <th>
            <?php
            echo "<select name='MainbordList' id='MainbordList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "MainBoard") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='CpuList' id='CpuList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "CPU") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='VGAList' id='VGAList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "VGA") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='RAMList' id='RAMList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "RAM") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='HDDList' id='HDDList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "HDD") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='OsList' id='OsList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "OprationSystem") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='MouseList' id='MouseList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "Mouse") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='keyBoardList' id='keyBoardList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "KeyBoard") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th>
            <?php
            echo "<select name='MonitorList' id='MonitorList'>";
            foreach ($product_array as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $type = $row['type'];
              if ($type == "Monitor") {
                echo "<option value='$id'>$name</option>";
              }
            }
            echo "</select>";
            ?>
          </th>
          <th class="editDeleteRow">
            <input class="buttonInsert3" type="submit" value="Insert Data">
          </th>
        </tr>

    </table>
    <br>
  </div>
  </form>

  <?php

  if (isset($msg)) {
    echo $msg;
  }
  ?>








  <div class="Chart">
    <p>نمودار بر اساس قدرت پردازنده مرکزی،حافظه جانبی و گرافیک برناه ریزی شده است</p>
    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>


    <?php
    $result = $conn->query($sql_q);


    $sum_score = 0;
    $avg_score = 0;

    $users = [];
    $scores = [];

    if ($result->num_rows > 0) {
      // output data of each row
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        array_push($users, $row);

        $$person_id = $row['id'];
        $personName = $row['user_fullname'];
        $ipAddress =  $row['ipAddress'];
        $mainBoard_id = $row['mainBoard'];

        $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
        $hardware_name = [];

        $sum_score = 0;
        foreach ($list_hardware as $item) {
          foreach ($product_array as $product) {

            // echo ($item);
            // break;


            if ($product['id'] == $row[$item]) {
              $product_name = $product['name'];
              // echo  $product['name'] . "<br>";
              // break;
              $sum_score += $product['score'];
            }
          }
        }
        $sum_score = ($sum_score) / 9;
        array_push($scores, $sum_score);
      }
    }
    mysqli_close($conn);


    // print_r($scores);

    ?>

    <script>
      <?php

      $txt = 'var xValues = [';
      foreach ($users as $user) {
        $name = $user['user_fullname'];
        $txt .= "'$name',";
      }
      $txt .= '];';
      echo $txt;

      $txt = 'var yValues = [';
      foreach ($scores as $score) {
        $txt .= "$score,";
      }

      $txt .= '];';
      echo $txt;
      ?>

      new Chart("myChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(95,200,250,1.0)",
            borderColor: "rgba(255,0,0,1.0)",
            data: yValues
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                min: 0,
                max: 100
              }
            }],
          }
        }
      });
    </script>
  </div>

  <script src="js/app.js"></script>
</body>

</html>