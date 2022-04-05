<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "c31c202121";


// Csatlakozás
$conn = new mysqli($servername, $username, $password, $dbname);

// Csatlakozás vizsgálata
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>