<?php
session_start();
include "./conectdb.php";
require_once ROOT_DIR . "/Components/alert.php";
$state = false;
$alerts = new alert();

if ((isset($_SESSION['user']) || isset($_SESSION['admin'])) && (!empty($_SESSION['user']) || !empty($_SESSION['admin']))) {
    $state = true;
    $username = $_SESSION['user'] ?? $_SESSION['admin'];

    // ดึง user_id จาก username
    $sql = "SELECT user_id FROM useraccount WHERE username = ?";
    $user = $conn->prepare($sql);
    $user->execute([$username]);
    $userData = $user->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $userID = $userData['user_id'];

        // ดึงข้อมูล career ทั้งหมดของผู้ใช้
        $sql1 = "SELECT * FROM career WHERE user_id = ?";
        $career = $conn->prepare($sql1);
        $career->execute([$userID]);
        $careerQuery = $career->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($careerQuery)) {
            foreach ($careerQuery as &$query) {
                $components = [
                    "cpu" => $query["cpu"],
                    "mainboard" => $query["mainboard"],
                    "ram" => $query["ram"],
                    "storge" => $query["storage"],
                    "psu" => $query["psu"]
                ];

                // ดึงชื่อของแต่ละอุปกรณ์และเพิ่มเข้าไปใน $query
                foreach ($components as $component => $id) {
                    $sql = "SELECT Name FROM $component WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$id]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    $query[$component . '_name'] = $result ? $result['Name'] : '-';
                }
            }
            unset($query); // ปลดการอ้างอิงของตัวแปร
        } else {
            $state = false;
        }
    } else {
        $state = false;
    }
} else {
    $state = false;
}

$ranksql = "SELECT useraccount.username, MAX(score) as max_score FROM `career` INNER JOIN useraccount ON useraccount.user_id = career.user_id GROUP BY career.user_id ORDER BY max_score DESC LIMIT 5";
$queryrank = $conn->prepare($ranksql);
$queryrank->execute();
$leaderboard = $queryrank->fetchAll(PDO::FETCH_ASSOC);
$leaderboardrows = $queryrank->rowCount();
$no = 1;
$qno = 1;
$inleader = false;
$userName = $_SESSION['user'] ?? $_SESSION['admin'] ?? null;
if (!empty($userName)) {
    foreach ($leaderboard as $user) {
        if ($user['username'] == $userName) {
            $inleader = true;
            
            break;
        }
        $qno++;
    }
}
$message;
if ($inleader) {
    $message = "คุณติดอันดับที่ {$qno}";
}else {
    $message = "ดูเหมือนว่าคุณจะยังไม่ติดอันดับนะ พยายามเข้า!!";
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
            background-image: url(./src/assets/View\ PC\ Bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(7px);
        }
        table {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }
    </style>
    <?php include ROOT_DIR . "/packlink.php"; ?>
</head>

<body>
    <?php include ROOT_DIR . "/proceed/navdisplay.php"; ?>
    <div class="container">
        <div>
            <p class="text text-white fs-4">
                Leaderboard/Career.
            </p>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="displaymode" style="width: 75px; height:35px;">
            </div>
        </div>
        <table class="table table-hover mt-5 text-white d-none" id="tables">
            <thead>
                <tr>
                    <th scope="col">Game ID</th>
                    <th scope="col">CPU</th>
                    <th scope="col">Mainboard</th>
                    <th scope="col">RAM</th>
                    <th scope="col">Storage</th>
                    <th scope="col">Power Supply</th>
                    <th scope="col">Game Type</th>
                    <th scope="col">Score</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($state && !empty($careerQuery)): ?>
                    <?php foreach ($careerQuery as $q): ?>
                        <?php
                        // การคำนวณเวลา
                        $timestamp = $q['createTime'];
                        $unixTime = strtotime($timestamp);
                        $timeElapsed = time() - $unixTime;

                        if ($timeElapsed < 60) {
                            $timeDisplay = $timeElapsed . " วินาทีที่แล้ว";
                        } elseif ($timeElapsed < 3600) {
                            $timeDisplay = floor($timeElapsed / 60) . " นาทีที่แล้ว";
                        } elseif ($timeElapsed < 86400) {
                            $timeDisplay = floor($timeElapsed / 3600) . " ชั่วโมงที่แล้ว";
                        } else {
                            $timeDisplay = floor($timeElapsed / 86400) . " วันที่แล้ว";
                        }
                        ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($q['id']); ?></th>
                            <td><?php echo htmlspecialchars($q['cpu_name']); ?></td>
                            <td><?php echo htmlspecialchars($q['mainboard_name']); ?></td>
                            <td><?php echo htmlspecialchars($q['ram_name']); ?></td>
                            <td><?php echo htmlspecialchars($q['storge_name']); ?></td>
                            <td><?php echo htmlspecialchars($q['psu_name']); ?></td>
                            <td><?php echo htmlspecialchars($q['Game_type']); ?></td>
                            <td><?php echo htmlspecialchars($q['score']); ?></td>
                            <td><?php echo htmlspecialchars($timeDisplay); ?></td>
                            <?php if (htmlspecialchars($q['Game_type']) == "Timer") : ?>
                                <td><button href="#" class="btn btn-outline-danger" disabled>More info</button></td>
                            <?php else : ?>
                                <td><a href="#" class="btn btn-outline-primary">More info</a></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="table-warning text-center">No available data or you may need to log in first.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <table class="table table-hover mt-5 text-white" style="width: 30vw;" id="ranks">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($leaderboardrows > 0) :?>
                    <?php foreach ($leaderboard as $userrank) :?>
                        <tr>
                    <th scope="row"><?php echo $no?></th>
                    <td><?php echo $userrank['username']?></td>
                    <td><?php echo $userrank['max_score']?></td>
                </tr>
                <?php $no++?>
                        <?php endforeach;?>
                        <?php else :?>
                            <th scope="row" colspan="3" class="table-warning text-center">ไม่พบข้อมูล.</th>
                    <?php endif;?>
            </tbody>
            <caption>
                <?php echo $message?>
  </caption>
        </table>
    </div>
    <?php include ROOT_DIR . "/packlink2.php"; ?>
    <script src="career.js"></script>
</body>

</html>