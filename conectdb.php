<?php
//url container
$url = "http://localhost/PC-Building/";

$servername = "localhost";
$username = "root";
$password = "";
$myDB = "pcbuilding";
date_default_timezone_set('Asia/Bangkok'); 
try {
  $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>