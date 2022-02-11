<?php

$servername = "localhost";
$username = "c31c202121";
$password = "BdmedRN_yHA8";
$dbname = "c31c202121";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>