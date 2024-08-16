<?php 

$Jsondata = urldecode($_GET['data']);
$data = json_decode($Jsondata,true);
var_dump($data);
?>