<?php
session_start();
include './conectdb.php';
$sql = "SELECT * FROM infomationdata";
$stmt = $conn->prepare($sql);
$stmt->execute();
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $conn->query($sql)->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชิ้นส่วนต่างๆของคอมพิวเตอร์</title>
    <link rel="stylesheet" href="<?php echo $url; ?>css/info.css">
    <?php
    include './packlink.php'
    ?>
</head>

<body>
    <?php
    include "./proceed/navdisplay.php";
    ?>
    <div class="container mt-5">
        <div class="row">
            <?php if ($rows > 0) : ?>
                <?php foreach ($query as $Data) { ?>
                    <?php
                    $timestamp = $Data['timeUpdate'];
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
                    <div class="col-4 col-lg-11 mb-2">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4 minimg">
                                    <img src="<?php echo $Data['picture']?>" class="img-fluid rounded-start" alt="..." loading="lazy">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fs-4"><strong><?php echo $Data['head']?></strong></h5>
                                        <p class="card-text fs-5">&emsp;<?php echo $Data['content']?></p>
                                        <p class="card-text"><small class="text-muted">แก้ไขล่าสุดเมื่อ <?php echo $timeDisplay?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php else : ?>
                <div class="alert alert-warning">
                    <p>ไม่พบข้อมูล</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <?php include './packlink2.php' ?>
</body>

</html>