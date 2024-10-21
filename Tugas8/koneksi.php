<?php
$servername = "localhost:8111";
$database = "mhs";
$usename = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $database, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  //echo "Connected successfully";
?>
