<?php
$host = "localhost:8111";
$database = "mhs";
$user = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 
  // echo "Connected successfully";
?>