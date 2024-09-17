<?php
session_start();
include "./../Components/alert.php";
$utils = new alert();
if (isset($_POST['status']) && $_POST['status'] == "remove"){
            if ($utils->delsession("counter") && $utils->delsession("score") && $utils->delsession("result") && $utils->delsession("Game")) {
                echo json_encode(['success' => true]);
            }else {
                echo json_encode(['success' => false]);
            }
            
}
?>