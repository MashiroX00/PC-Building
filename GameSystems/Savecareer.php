<?php
session_start();
include __DIR__ . "/../conectdb.php";
require_once ROOT_DIR . "/Components/alert.php";
$alerts = new alert();
$data = $_POST["datainfo"];
$Arraydata = json_decode($data, true);
$newVariables = [];
$IDUser = null;

foreach ($Arraydata as $item) {
    // สร้างชื่อตัวแปลโดยนำชนิดอุปกรณ์มาต่อกับ '_id'
    $variableName = $item['type'] . '_id';

    // สร้างตัวแปลใหม่และกำหนดค่า
    $$variableName = $item['id'];

    // บันทึกชื่อตัวแปลและค่าลงในอาร์เรย์ $newVariables (เพื่อการใช้งานเพิ่มเติม)
    $newVariables[$variableName] = $item['id'];
}

// ตัวอย่างการใช้งานตัวแปลใหม่
// echo $cpu_id; // จะแสดงค่า id ของ CPU

//Collect UserId
if (isset($_SESSION['user']) || isset($_SESSION['admin']) && !empty($_SESSION['user']) || !empty($_SESSION['admin'])) {
    $username = $_SESSION['user'] ?? $_SESSION['admin'];
    $sql1 = "SELECT user_id FROM useraccount WHERE username = ?";
    $stmt = $conn->prepare($sql1);
    $stmt->execute([$username]);
    $ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($ID as $UserID) {
        $IDUser = $UserID['user_id'];
    }
}else {
    $alerts->setalert("error","Can't Save Your Computer. You may login first");
    $alerts->header("index.php");
    exit;
}
if (!empty($IDUser)) {
    $sql = "INSERT INTO career (user_id,cpu,mainboard,ram,storage,psu) VALUES (?,?,?,?,?,?)";
    $stmt1 = $conn->prepare($sql);
    $stmt1->execute([$IDUser,$cpu_id,$mainboard_id,$ram_id,$storage_id,$psu_id]);
    if ($stmt1) {
        $alerts->setalert("success","Your computer are saved.");
        $alerts->header("index.php");
        exit;
    }else {
    $alerts->setalert("error","Can't Save Your Computer.Please Contact Administrator.");
    $alerts->header("index.php");
    exit;
    }
}

?>