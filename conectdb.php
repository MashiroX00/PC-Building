<?php
//url container
$url = "http://localhost/PC-Building/";
define('ROOT_DIR', dirname(__FILE__));

$servername = "localhost";
$username = "root";
$password = "";
$myDB = "pcbuild";
date_default_timezone_set('Asia/Bangkok'); 
try {
  $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "<script>console.log('Success');</script>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 