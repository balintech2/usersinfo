<!DOCTYPE html>
<?php
include "init.php";

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<head>

  <link href="style/style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="/images/img/favicon.ico">
  <title>INFORMATION of MANAGEMENT PC's</title>
  <meta charset="UTF-8">

</head>

<body class="bodyMan">
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

  $check = false;
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['method'])) {

      $method = $_GET['method'];
      if ($method == "edit") {
        $user_id = $_GET['id'];
        $ref = $_GET['ref'];

        $sql = "SELECT * FROM `accessories` WHERE id=$user_id";
        // echo $sql;

        $result = $conn->query($sql);



        // print_r($product_array);


        if ($result->num_rows > 0) {
          // output data of each row
          $i = 0;
          while ($row = $result->fetch_assoc()) {

            $person_id = $row['id'];
            $personName = $row['user_fullname'];
            $ipAddress =  $row['ipAddress'];
            $mainBoard_id = $row['mainBoard'];
            $cpu_id = $row['cpu'];
            $vga_id = $row['VGA'];
            $ram_id = $row['RAM'];
            $hdd_id = $row['HDD'];
            $Opration_System_id = $row['Opration_System'];
            $Mouse_id = $row['Mouse'];
            $KeyBouard_id = $row['KeyBouard'];
            $Monitor_id = $row['Monitor'];

            // $list_hardware = ['mainBoard', 'cpu', 'VGA', 'RAM', 'HDD', 'Opration_System', 'Mouse', 'KeyBouard', 'Monitor'];
            // $hardware_name = [];

            // foreach ($list_hardware as $item) {
            //   foreach ($product_array as $product) {

            //     // echo ($item);
            //     // break;

            //     if ($product['id'] == $row[$item]) {
            //       $product_name = $product['name'];
            //       // echo  $product['name'] . "<br>";
            //       // break;
            //     }
            //     $hardware_name[$item] = $product_name;
            //     // $mainBoard = $product_name;
            //   }
            // }


            // $mainBoard = $hardware_name['mainBoard'];
            // $cpu =  $hardware_name['cpu'];
            // $vga = $hardware_name['VGA'];
            // $ram = $hardware_name['RAM'];
            // $hdd = $hardware_name['HDD'];
            // $oprationSystem = $hardware_name['Opration_System'];
            // $mouse = $hardware_name['Mouse'];
            // $keyBoard = $hardware_name['KeyBouard'];
            // $monitor = $hardware_name['Monitor'];

            $i++;
          }
          $check = true;
        }
      }
    }
  }



  if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $ref = $_POST['ref'];
    $user_id = intval($_POST['userid']);
    $fname = $_POST['PersonName'];
    $iplocal = $_POST['ipaddress'];
    $MainbordList = $_POST['MainbordList'];
    $CpuList = $_POST['CpuList'];
    $VGAList = $_POST['VGAList'];
    $RAMList = $_POST['RAMList'];
    $HDDList = $_POST['HDDList'];
    $OsList = $_POST['OsList'];
    $MouseList = $_POST['MouseList'];
    $keyBoardList = $_POST['keyBoardList'];
    $MonitorList = $_POST['MonitorList'];

    // prepare and bind

    $types = "sssssssssssi";

    $parameters = array($fname, $iplocal, $MainbordList, $CpuList, $VGAList, $RAMList, $HDDList, $OsList, $MouseList, $keyBoardList, $MonitorList, $user_id);
    $stmt = $conn->prepare("UPDATE accessories SET user_fullname= ?,ipAddress= ?,mainBoard= ?,`cpu`= ?,VGA= ?,RAM= ?,HDD= ?,Opration_System= ?,Mouse= ?,KeyBouard= ?,Monitor= ? WHERE id= ?");
    $stmt->bind_param($types, ...$parameters);



    // set parameters and execute
    $msg_st = $stmt->execute();

    $stmt->close();


    //   $sql = 'UPDATE `accessories` SET `user_fullname`=" . "[$fname],`ipAddress`=".[$iplocal],`mainBoard`=[".value-4],`cpu`=[value-5],`VGA`=[value-6],`RAM`=[value-7],`HDD`=[value-8],`Opration_System`=[value-9],`Mouse`=[value-10],`KeyBouard`=[value-11],`Monitor`=[value-12],`department`=[value-13] WHERE `id`=$user_id';

    //   // echo $sql;
    //   if (mysqli_query($conn, $sql)) {
    //     $msg = "<h3 class='msgs'>data stored in a database successfully.</h3>";
    //   } else {
    //     $msg = "<h3 class='msge'>ERROR: Hush! Sorry $sql. " . mysqli_error($conn) . "</h3>";
    //   }
    // }
    $check = true;
    header("Location: $ref.php");
    die();
  }


  if (!$check) {
    header("Location: index.php");
    die();
  }

  mysqli_close($conn);

  ?>

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


  <div class="main">
    <div class="box">
      <form action="" method="post">
        <input type="hidden" name="userid" id="userid" value="<?php echo $user_id ?>">
        <input type="hidden" name="ref" id="ref" value="<?php echo $ref ?>">
        <label for="PersonName">Person Name</label>
        <input id="PersonName" name="PersonName" type="text" value="<?php echo $personName ?>">

        <label for="ipaddress">IP Address</label>
        <input id="ipaddress" name="ipaddress" type="text" value="<?php echo $ipAddress ?>">

        <label for="MainbordList">MainBoard</label>
        <?php
        echo "<select name='MainbordList' id='MainbordList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "MainBoard") {
            if ($id == $mainBoard_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>


        <label for="CpuList">CPU</label>
        <?php
        echo "<select name='CpuList' id='CpuList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];

          if ($type == "CPU") {
            if ($id == $cpu_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>

        <label for="VGAList">VGA</label>
        <?php
        echo "<select name='VGAList' id='VGAList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "VGA") {
            if ($id == $vga_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>

        <label for="RAMList">RAM</label>
        <?php
        echo "<select name='RAMList' id='RAMList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "RAM") {
            if ($id == $ram_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>

        <label for="HDDList">HDD || SSD</label>
        <?php
        echo "<select name='HDDList' id='HDDList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "HDD") {
            if ($id == $hdd_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>

        <label for="OsList">Operation System</label>
        <?php
        echo "<select name='OsList' id='OsList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "OprationSystem") {
            if ($id == $Opration_System_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>

        <label for="MouseList">Mouse</label>

        <?php
        echo "<select name='MouseList' id='MouseList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "Mouse") {
            if ($id == $Mouse_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";
        ?>


        <label for="keyBoardList">keyBoard</label>
        <?php
        echo "<select name='keyBoardList' id='keyBoardList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "KeyBoard") {
            if ($id == $KeyBouard_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";

        ?>

        <label for="MonitorList">Monitor</label>
        <?php
        echo "<select name='MonitorList' id='MonitorList'>";
        foreach ($product_array as $row) {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          if ($type == "Monitor") {
            if ($id == $Monitor_id) {
              echo "<option value='$id' selected>$name</option>";
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
        }
        echo "</select>";

        ?>

        <input class="buttonEdit" type="submit" value="Update Data">
      </form>
    </div>
  </div>







  <script src="js/app.js"></script>
</body>

</html>