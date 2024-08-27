<?php 
session_start();
include './../conectdb.php';
require ROOT_DIR . "/Components/alert.php";
$alerts = new alert();

$userid = 0;
$gameSeed = $_POST["seed"];
$gametype = "Timer";

if (!empty($gameSeed)) {
    $sql = "SELECT score FROM timermodetmp WHERE gameid = ?";
    $query = $conn->prepare($sql);
    $query->execute([$gameSeed]);
    $rawscore = $query->fetchAll(PDO::FETCH_ASSOC);
    $rows = $query->rowCount();
    $score = 0;
    if ($rows > 0 ) {
        foreach ($rawscore as $data) {
            $ParseScore = (int)$data['score'];
            $score = $score + $ParseScore;
        }
    }else {
        $alerts->setalert("error","Somethings went wrong.");
        $alerts->header("index.php");
        exit;
    }
    $username = $_SESSION['user'] ?? $_SESSION['admin'];
    $userquery = $conn->prepare("SELECT user_id FROM useraccount WHERE username = ?");
    $userquery->execute([$username]);
    $userdata = $userquery->fetchAll(PDO::FETCH_ASSOC);
    foreach ($userdata as $data) {
        $userid = $data['user_id'];
    }

    if ($userid != 0) {
        $sql1 = "INSERT INTO career (user_id,score,Game_type) VALUES (?,?,?)";
        $Savecareer = $conn->prepare($sql1);
        $Savecareer->execute([$userid,$score,$gametype]);
        if ($Savecareer) {
            $delete = "DELETE FROM timermodetmp WHERE gameid = ?";
            $stmt = $conn->prepare($delete);
            $stmt->execute([$gameSeed]);
            $alerts->setalert("success","Game Saved.");
            $alerts->header("index.php");
        }else {
            $alerts->setalert("error","Somethings went wrong.");
        $alerts->header("index.php");
        exit;
        }
    }else {
        $alerts->setalert("error","Somethings went wrong.");
        $alerts->header("index.php");
        exit;
    }
    
    
}else {
    $alerts->setalert("error","Somethings went wrong.");
        $alerts->header("index.php");
        exit;
}
?>