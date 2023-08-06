<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "balintech";



$conn = new mysqli($serverName, $userName, $password, $dbName);
mysqli_query($conn, "SET NAMES utf8");
// $conn->query("SET CHARACTER SET utf8");

mysqli_close($conn);

// $mydomain = "localhost/site/project/kaka";

// Create connection
