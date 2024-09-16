<?php
//env loader
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//url container
$Protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$hostip = $_SERVER['HTTP_HOST'];
$primaryurl =  $Protocol."://".$hostip;
$path = $_ENV['APP'];
$url = $primaryurl.$path;
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
  echo "<script>console.log('Success')</script>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

require_once ROOT_DIR .'/Components/controller.php';
$Controller = new Controller($conn);
?> 