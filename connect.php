<?php
//php version 8 
$servername = "localhost";
$username = "root";
$password = "123456";
$db = "member";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>