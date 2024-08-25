<?php
session_start();
include "./conectdb.php";
require_once ROOT_DIR . "/Components/alert.php";
$state = false;
$alerts = new alert();

if (isset($_SESSION['user']) || isset($_SESSION['admin']) && !empty($_SESSION['user']) || !empty($_SESSION['admin'])) {
    $state = true;
    $username = $_SESSION['user'] ?? $_SESSION['admin'];
    $sql = "SELECT user_id FROM useraccount WHERE username = ?";
    $user = $conn->prepare($sql);
    $user->execute([$username]);
    $usequery = $user->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usequery as $data) {
        $userID = $data['user_id'];
    }

    $sql1 = "SELECT * FROM career WHERE user_id = ?";
    $career = $conn->prepare($sql1);
    $career->execute([$userID]);
    $careerQuery = $career->fetchAll(PDO::FETCH_ASSOC);
    $rows = $career->rowCount();
    if ($rows <= 0) {
        $state = false;
    }
}else {
    $state = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PC</title>
    <style>
        body {
    background-color: #1d0c1b !important;

}
    </style>
    <?php include ROOT_DIR . "/packlink.php"; ?>
</head>

<body>
    <?php include  ROOT_DIR ."/proceed/navdisplay.php"?>
    <div class="container ">
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Game ID</th>
                    <th scope="col">CPU_ID</th>
                    <th scope="col">Mainboard_ID</th>
                    <th scope="col">Ram_ID</th>
                    <th scope="col">Storage_ID</th>
                    <th scope="col">Power Supply_ID</th>
                    <th scope="col">Game Type</th>
                    <th scope="col">Score</th>
                    <th scope="col">date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($state):?>
                    
                        <?php foreach ($careerQuery as $q) {?>
                            <?php 
                             $timestamp = $q['createTime'];
                             $unixTime = strtotime($timestamp);
                             $timeElapsed = time() - $unixTime;
                             if ($timeElapsed < 60) {
                                 $timeDisplay = $timeElapsed . " วินาที";
                             } elseif ($timeElapsed < 3600) {
                                 $timeDisplay = floor($timeElapsed / 60) . " นาที";
                             } elseif ($timeElapsed < 86400) {
                                 $timeDisplay = floor($timeElapsed / 3600) . " ชั่วโมง";
                             } else {
                                 $timeDisplay = floor($timeElapsed / 86400) . " วัน";
                             }
                                ?>
                            <tr>
                            <th scope="row"><?php echo $q['id']?></th>
                            <td><?php echo $q['cpu']?></td>
                            <td><?php echo $q['mainboard']?></td>
                            <td><?php echo $q['ram']?></td>
                            <td><?php echo $q['storage']?></td>
                            <td><?php echo $q['psu']?></td>
                            <td><?php echo $q['Game_type']?></td>
                            <td><?php echo $q['score']?></td>
                            <td><?php echo $timeDisplay . "ที่แล้ว"?></td>
                            <td><a href="" class="btn btn-outline-primary">More info</a></td>
                            </tr>
                            <?php }?>
                   
                    <?php else :?>
                        <tr>
                            <td colspan="10" class="table-warning">No available or you may loggin first.</td>
                        </tr>
                        <?php endif?>
            </tbody>
    </table>
    </div>
    <?php include  ROOT_DIR . "/packlink2.php"; ?>
</body>

</html>