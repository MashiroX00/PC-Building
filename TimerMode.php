<?php
session_start();
include './conectdb.php';
require ROOT_DIR . "/Components/alert.php";
$alerts = new alert();

if (isset($_SESSION['user']) || isset($_SESSION['admin']) && !empty($_SESSION['user']) || !empty($_SESSION['admin'])) {
    $username = $_SESSION['user'] ?? $_SESSION['admin'];
    $usersql = "SELECT user_id FROM useraccount WHERE username = ?";
    $userstmt = $conn->prepare($usersql);
    $userstmt->execute([$username]);
    $queryuser = $userstmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($queryuser as $userData) {
        $userid = $userData["user_id"];
    }
} else {
    $alerts->setalert("error", "You should loggin first");
    $alerts->header("index.php");
}

$Setime = $_POST['timeleft'] ?? 120;
$cpu = array("id", "Name", "Ghz", "Socket", "picture");
$mainboard  = array("id", "Name", "Cpu_socket", "Ram_ddr", "picture");
$ram  = array("id", "Name", "ddr", "Size", "bus", "picture");
$storge = array("id", "Name", "Size", "picture", "Type");
$psu = array("id", "Name", "watt", "picture");
$cpuName = "";
$mainboardName = "";
$ramName = "";
$storageName = "";
$psuName = "";
$nummainboard = "";
$numcpu = "";
$numram = "";
$numstorge = "";
$numpsu = "";

$tables = array(
    "cpu" => array(
        "id",
        "Name",
        "Ghz",
        "Socket",
        "picture"
    ),
    "mainboard" => array(
        "id",
        "Name",
        "Cpu_socket",
        "Ram_ddr",
        "picture"
    ),
    "ram" => array(
        "id",
        "Name",
        "ddr",
        "Size",
        "bus",
        "picture"
    ),
    "storge" => array(
        "id",
        "Name",
        "Size",
        "picture",
        "Type"
    ),
    "psu" => array(
        "id",
        "Name",
        "watt",
        "picture"
    )
);
foreach ($tables as $table => $columns) {
    $sql = "SELECT " . implode(",", $columns) . " FROM " . $table;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $$table = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$Seed = $_POST['gameid'] ?? 0;
if (empty($Seed)) {
    $requirdGameId = true;
    while ($requirdGameId) {
        $gameid = rand(10, 5000);
        $gamesql = "SELECT gameid FROM timermodetmp WHERE gameid = ?";
        $checkgameid = $conn->prepare($gamesql);
        $checkgameid->execute([$gameid]);
        if ($checkgameid->rowCount() > 0) {
            $requirdGameId = true;
        } else {
            $requirdGameId = false;
            $Seed = $gameid;
        }
    }
}
$missingpart = rand(1, 5);
$randprev = $_POST['rand'] ?? 0;
//ตรวจสอบว่าเลขซ้ำกับก่อนหน้ารึป่าว
if (!empty($randprev)) {
    do {
        $missingpart = rand(1, 5);
    } while ($missingpart == $randprev);
}

$cpupart = true;
$mainboardpart = true;
$rampart = true;
$storagepart = true;
$psupart = true;
switch ($missingpart) {
    case 1:
        $cpupart = false;
        break;
    case 2:
        !$mainboardpart = false;
        break;
    case 3:
        !$rampart = false;
        break;
    case 4:
        !$storagepart = false;
        break;
    case 5:
        !$psupart = false;
        break;
    default:
        !$cpupart = false;
        break;
}
//cpu
if ($cpupart) {
    $cpustate = true;
    while ($cpustate) {
        $num = rand(1, 100);
        $cpusql = "SELECT id,cpu.Name FROM cpu WHERE cpu.id = ?";
        $querycpu = $conn->prepare($cpusql);
        $querycpu->execute([$num]);
        $row = $querycpu->fetchAll(PDO::FETCH_ASSOC);

        if ($row) {
            // echo "cpu : " . $num;
            $cpustate = false;
            $numcpu = $num;
            foreach ($row as $cp) {
                $cpuName = $cp['Name'];
            }
        }
    }
}
//mainboard
if ($mainboardpart) {
    $mainboardstate = true;
    while ($mainboardstate) {
        $num = rand(1, 100);
        $mainboardsql = "SELECT id,mainboard.Name FROM mainboard WHERE mainboard.id = ?";
        $querymainboard = $conn->prepare($mainboardsql);
        $querymainboard->execute([$num]);
        $row = $querymainboard->fetchAll(PDO::FETCH_ASSOC);

        if ($row) {
            // echo "mb : " . $num;
            $mainboardstate = false;
            $nummainboard = $num;
            foreach ($row as $mb) {
                $mainboardName = $mb['Name'];
            }
        }
    }
}
//ram
if ($rampart) {
    $ramstate = true;
    while ($ramstate) {
        $num = rand(1, 100);
        $ramsql = "SELECT id,ram.Name FROM ram WHERE ram.id = ?";
        $queryram = $conn->prepare($ramsql);
        $queryram->execute([$num]);
        $row = $queryram->fetchAll(PDO::FETCH_ASSOC);

        if ($row) {
            // echo "ram : " . $num;
            $ramstate = false;
            $numram = $num;
            foreach ($row as $rm) {
                $ramName = $rm['Name'];
            }
        }
    }
}
//storage
if ($storagepart) {
    $storagetate = true;
    while ($storagetate) {
        $num = rand(1, 100);
        $storgesql = "SELECT id,storge.Name FROM storge WHERE storge.id = ?";
        $querystorge = $conn->prepare($storgesql);
        $querystorge->execute([$num]);
        $row = $querystorge->fetchAll(PDO::FETCH_ASSOC);

        if ($row) {
            // echo "storage : " . $num;
            $storagetate = false;
            $numstorge = $num;
            foreach ($row as $st) {
                $storageName = $st['Name'];
            }
        }
    }
}
//power suplly
if ($psupart) {
    $psustate = true;
    while ($psustate) {
        $num = rand(1, 100);
        $psusql = "SELECT id,psu.Name FROM psu WHERE psu.id = ?";
        $querypsu = $conn->prepare($psusql);
        $querypsu->execute([$num]);
        $row = $querypsu->fetchAll(PDO::FETCH_ASSOC);

        if ($row) {
            // echo "psu : " . $num;
            $psustate = false;
            $numpsu = $num;
            foreach ($row as $ps) {
                $psuName = $ps['Name'];
            }
        }
    }
}
$itemtype = $_POST['itemtype'] ?? false;
$cpuitem = $_POST['numcpu'] ?? null;
$mbitem = $_POST['nummb'] ?? null;
$rmitem = $_POST['numrm'] ?? null;
$stitem = $_POST['numst'] ?? null;
$psitem = $_POST['numps'] ?? null;
if ($itemtype == 1) {
    $itemid = $_POST['cpu'] ?? 0;
    $point = 25;

    if (!empty($itemid)) {
        $cpusql = "SELECT Socket FROM cpu WHERE id = ?";
        $cpustmt = $conn->prepare($cpusql);
        $cpustmt->execute([$itemid]);
        $querylga = $cpustmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querylga as $lgadata) {
            $lga = $lgadata['Socket'];
        }

        $checksql = "SELECT mainboard.Cpu_socket FROM mainboard WHERE mainboard.id = ? AND mainboard.Cpu_socket = ?";
        $check = $conn->prepare($checksql);
        $check->execute([$mbitem, $lga]);
        $result = $check->rowCount();

        if ($result > 0) {
            $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
            $querytmp = $conn->prepare($tmp);
            $querytmp->execute([$userid, $point, $Seed]);
            $alerts->setalert("success", "+25 point");
        } else {
            $point = $point - 10;
            $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
            $querytmp = $conn->prepare($tmp);
            $querytmp->execute([$userid, $point, $Seed]);
            $alerts->setalert("success", "+15/25 point");
        }
    } else {
        $alerts->setalert("error", "Please fill the missing box.");
    }
} elseif ($itemtype == 2) {
    $itemid = $_POST['mainboard'] ?? 0;
    $point = 30;

    if (!empty($itemid)) {
        $mainboardsql = "SELECT Cpu_socket,Ram_ddr FROM mainboard WHERE id = ?";
        $mbstmt = $conn->prepare($mainboardsql);
        $mbstmt->execute([$itemid]);
        $querymb = $mbstmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querymb as $mbdata) {
            $lga = $mbdata['Cpu_socket'];
            $ddr = $mbdata['Ram_ddr'];
        }

        $checksql = "SELECT Socket FROM cpu WHERE cpu.id = ? AND cpu.Socket = ?";
        $check = $conn->prepare($checksql);
        $check->execute([$cpuitem, $lga]);
        $result = $check->rowCount();

        $checksql1 = "SELECT ddr FROM ram WHERE ram.id = ? AND ram.ddr = ?";
        $check1 = $conn->prepare($checksql1);
        $check1->execute([$rmitem, $ddr]);
        $result1 = $check1->rowCount();

        if ($result || $result1 > 0) {
            $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
            $querytmp = $conn->prepare($tmp);
            $querytmp->execute([$userid, $point, $Seed]);
            $alerts->setalert("success", "+30/30 point");
        } else {
            $point = $point - 15;
            $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
            $querytmp = $conn->prepare($tmp);
            $querytmp->execute([$userid, $point, $Seed]);
            $alerts->setalert("success", "+15/30 point");
        }
    } else {
        $alerts->setalert("error", "Please  fill the missing box.");
    }
} elseif ($itemtype == 3) {
    $itemid = $_POST['ram'] ?? 0;
    $point = 15;

    if (!empty($itemid)) {
        $ramsql = "SELECT ddr FROM ram WHERE id = ?";
        $ramstmt = $conn->prepare($ramsql);
        $ramstmt->execute([$itemid]);
        $querm = $ramstmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querm as $rmdata) {
            $ddr = $rmdata['ddr'];
        }

        $checksql = "SELECT Ram_ddr FROM mainboard WHERE mainboard.id = ? AND mainboard.Ram_ddr = ?";
        $check = $conn->prepare($checksql);
        $check->execute([$mbitem, $ddr]);
        $result = $check->rowCount();

        if ($check > 0) {
            $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
            $querytmp = $conn->prepare($tmp);
            $querytmp->execute([$userid, $point, $Seed]);
            $alerts->setalert("success", "+15/15 point");
        } else {
            $point = $point - 5;
            $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
            $querytmp = $conn->prepare($tmp);
            $querytmp->execute([$userid, $point, $Seed]);
            $alerts->setalert("success", "+10/15 point");
        }
    } else {
        $alerts->setalert("error", "Please fill the missing box.");
    }
} elseif ($itemtype == 4) {
    $itemid = $_POST['storage'] ?? 0;
    $point = 20;

    if (!empty($itemid)) {
        $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
        $querytmp = $conn->prepare($tmp);
        $querytmp->execute([$userid, $point, $Seed]);
        $alerts->setalert("success", "+20/20 point");
    } else {
        $alerts->setalert("error", "Please fill the missing box.");
    }
} elseif ($itemtype == 5) {
    $itemid = $_POST['psu'] ?? 0;
    $point = 20;
    if (!empty($itemid)) {
        $tmp = "INSERT INTO timermodetmp (userid,score,gameid) VALUES (?,?,?)";
        $querytmp = $conn->prepare($tmp);
        $querytmp->execute([$userid, $point, $Seed]);
        $alerts->setalert("success", "+20/20 point");
    } else {
        $alerts->setalert("error", "Please fill the missing box.");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $url ?>css/TimerMode.css">
    <?php
    include './packlink.php';
    ?>
</head>

<body onload="countdown()">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-lg-2 border vh-100 overflow-y-scroll sc" style="background-color: #D9D9D9;">
                <h3 class="text text-white text-center m-3">Item(อุปกรณ์)</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                CPU
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($cpu as $Cpu) { ?>
                                        <li class="list-group-item">
                                            <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $Cpu['id']; ?>","name" : "<?php echo $Cpu['Name']; ?>", "type" : "cpu", "picture" : "<?php echo $Cpu['picture'] ?>"}'>
                                                <img src="<?php echo $url . $Cpu['picture'] ?>" alt="" width="100px" draggable="false"><br>
                                                <span class="text fs-6">Name: <?php echo $Cpu['Name'] ?></span><br>
                                                <span class="text fs-6">Ghz: <?php echo $Cpu['Ghz'] ?></span><br>
                                                <span class="text fs-6">Socket: <?php echo $Cpu['Socket'] ?></span><br>
                                            </div>
                                        </li>
                                    <?php }; ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Mainboard
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($mainboard as $mb) { ?>
                                        <li class="list-group-item">
                                            <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $mb['id']; ?>","name" : "<?php echo $mb['Name']; ?>", "type" : "mainboard", "picture" : "<?php echo $mb['picture'] ?>"}'>
                                                <img src="<?php echo $url . $mb['picture'] ?>" alt="" width="100px" draggable="false"><br>
                                                <span class="text fs-6">Name: <?php echo $mb['Name'] ?></span><br>
                                                <span class="text fs-6">Ram DDR: <?php echo $mb['Ram_ddr'] ?></span><br>
                                                <span class="text fs-6">Cpu Socket: <?php echo $mb['Cpu_socket'] ?></span><br>
                                            </div>
                                        </li>
                                    <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Ram
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($ram as $rm) { ?>
                                        <li class="list-group-item">
                                            <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $rm['id']; ?>","name" : "<?php echo $rm['Name']; ?>", "type" : "ram", "picture" : "<?php echo $rm['picture'] ?>"}'>
                                                <img src="<?php echo $url . $rm['picture'] ?>" alt="" width="100px" draggable="false"><br>
                                                <span class="text fs-6">Name: <?php echo $rm['Name'] ?></span><br>
                                                <span class="text fs-6">DDR: <?php echo $rm['ddr'] ?></span><br>
                                                <span class="text fs-6">Size: <?php echo $rm['Size'] ?></span><br>
                                                <span class="text fs-6">Bus: <?php echo $rm['bus'] ?></span><br>
                                            </div>
                                        </li>
                                    <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Storage
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($storge as $st) { ?>
                                        <li class="list-group-item">
                                            <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $st['id']; ?>","name" : "<?php echo $st['Name']; ?>", "type" : "storage", "picture" : "<?php echo $st['picture'] ?>"}'>
                                                <img src="<?php echo $url . $st['picture'] ?>" alt="" width="100px" draggable="false"><br>
                                                <span class="text fs-6">Name: <?php echo $st['Name'] ?></span><br>
                                                <span class="text fs-6">Size(GB): <?php echo $st['Size'] ?></span><br>
                                                <span class="text fs-6">Type: <?php echo $st['Type'] ?></span><br>
                                            </div>
                                        </li>
                                    <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingfift">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefift" aria-expanded="false" aria-controls="flush-collapsefift">
                                Power Supply
                            </button>
                        </h2>
                        <div id="flush-collapsefift" class="accordion-collapse collapse" aria-labelledby="flush-headingfift" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><?php foreach ($psu as $pu) { ?>
                                    <li class="list-group-item">
                                        <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $pu['id']; ?>","name" : "<?php echo $pu['Name']; ?>", "type" : "psu", "picture" : "<?php echo $pu['picture'] ?>"}'>
                                            <img src="<?php echo $url . $pu['picture'] ?>" alt="" width="100px" draggable="false"><br>
                                            <span class="text fs-6">Name: <?php echo $pu['Name'] ?></span><br>
                                            <span class="text fs-6">Watt: <?php echo $pu['watt'] ?></span><br>
                                        </div>
                                    </li>
                                <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-lg-9 case container1 container-fluid">
                <div style="width: 22%;">
                    <?php $alerts->showalert();
                $alerts->unsetalert();
                ?>
                </div>
                
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="setTimeLeft()">
                    <p class="text fs-3">Remaining Time: <span id="timer"><?php echo $Setime ?></span><span> วินาที</span></p>
                    <div style="width: 22%;" class="">
                        <div class="progress" id="progressbarupdate" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger overflow-visible" style="width: 75%" id="progress-live"></div>
                        </div>
                    </div>
                    <span>Game ID(Seed): </span>
                    <p class="text fs-5" id="GameSeed"><?php echo $Seed ?></p>
                    <div class="dropzone box-1" id="dropzone1" data-item-type="cpu"><?php echo $cpuName ?></div>
                    <div class="dropzone box-2" id="dropzone2" data-item-type="mainboard"><?php echo $mainboardName ?></div>
                    <div class="dropzone box-3" id="dropzone3" data-item-type="ram"><?php echo $ramName ?></div>
                    <div class="dropzone box-5" id="dropzone4" data-item-type="storage"><?php echo $storageName ?></div>
                    <div class="dropzone box-4" id="dropzone5" data-item-type="psu"><?php echo $psuName ?></div>
                    <input type="hidden" name="timeleft" value="<?php echo $Setime ?>">
                    <input type="hidden" name="itemtype" value="<?php echo $missingpart ?>">
                    <input type="hidden" name="numcpu" value="<?php echo $numcpu ?>">
                    <input type="hidden" name="nummb" value="<?php echo $nummainboard ?>">
                    <input type="hidden" name="numrm" value="<?php echo $numram ?>">
                    <input type="hidden" name="numst" value="<?php echo $numstorge ?>">
                    <input type="hidden" name="numps" value="<?php echo $numpsu ?>">
                    <input type="hidden" name="gameid" value="<?php echo $Seed ?>">
                    <input type="hidden" name="rand" value="<?php echo $missingpart ?>">
                    <button class="btn btn-outline-primary" type="submit">Answer(ส่งคำตอบ)</button>
                </form>
            </div>
            <div class="col-4 col-lg-1">
            <div class="row">
          <div class="col-12 col-sm-12">
            <div class="float-end">
              <?php
              include './Components/TimermodalMenu.php';
              ?>
            </div>
          </div>
          <div class="col-12 col-sm-12 mb-4">
            <div class="float-end mt-1"><button onclick="sendXML()" class="btn btn-warning">Fisnish<br>(จบการเล่น)</button></div><br>
          </div>
          <div class="col-12 col-sm-12 ">
            <div class="float-end overflow-visible">
              <button type="button" class="btn" data-bs-toggle="popover" data-bs-title="ช่วยเหลือ" data-bs-content="ลากไอเทมจากทางซ้ายมือมาใส่ลงในกล่องทางขวามือให้ตรงกับประเภทของกล่องนั่นๆ" data-bs-placement="left" >
                 <i class="fa-regular fa-circle-question fa-2xl"></i> 
                </button>

            </div>
          </div>
        </div>
            </div>
        </div>
    </div>
    <?php
    include './packlink2.php';
    ?>
    <script src="<?php echo $url ?>GameSystems/TimerCollector.js"></script>
    </script>
</body>

</html>