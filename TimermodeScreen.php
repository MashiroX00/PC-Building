<?php 
session_start();
include './conectdb.php';
include ROOT_DIR . "/Components/alert.php";
$rou = new alert();

if (empty($rou->ShowSession("result"))) {
    $rou->header("index.php");
}
if ($_SESSION["Game"] == "Advance") {
    $play = "AdvanceMode.php";
}else {
    $play = "TimerMode.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timermode Result.</title>
    <?php include ROOT_DIR . "/packlink.php"?>
    <style>
        body {
            background-image: url(./src/assets/View\ PC\ Bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(15px);
        }
    </style>
    <script>
        function clearsessionreq(value) {
            var xdr = new XMLHttpRequest();
            xdr.open('POST',"<?php echo $rou->getserverip()?>Components/removesession.php",true);
            xdr.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
            xdr.onload = function() {
                if (xdr.status === 200) {
                try {
                var response = JSON.parse(xdr.responseText);
                if(response.success) {
                    console.log("Session removed.");
                    if (value == 'Play') {
                        window.location.href = '<?php $rou->getserverip()?><?php echo $play?>';
                    }else if (value == 'Leader') {
                        window.location.href = '<?php $rou->getserverip()?>viewpc.php';
                    }else if (value == 'Return'){
                        window.location.href = '<?php $rou->getserverip()?>index.php';
                    }else {
                        console.log('failed');
                    }
                }else {
                    console.log("cannot remove session.");
                }
            }catch(e) {
                console.log("cannot remove session:",e);
            }
            }else {
                console.log("Request Failed.")
            }
            };
            xdr.send('status=remove');
        }
    </script>
</head>
<body>
    <?php include ROOT_DIR . "/proceed/navdisplay.php"?>
    <div class="container">
    <?php if ($rou->Logmessage() != false) :?>
        <div class="toast-container p-3 top-25 end-0" id="toastPlacement" data-original-class="toast-container p-3">
        <div class="toast align-items-center text-bg-light border-0 fade show " role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
        <?php 
                    echo $rou->Logmessage();
                    $rou->unsetalert();
                ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
        </div>
    <?php endif;?>
        <div class="row mt-5">
            <!-- column1 -->
            <div class="col-4">
    
            </div>
            <div class="col-4 text-center mt-5 text-white">
            <p class="text-decoration-underline" style="font-size: 60px;">หมดเวลา!!!</p>
            <p style="font-size: 26px;">ซ่อมไปแล้วทั้งหมด : <?php echo $rou->ShowSession("counter");?> ชิ้นส่วน</p>
            <p style="font-size: 26px;" class="mb-5">ได้คะแนนทั้งหมด : <?php echo $rou->ShowSession("score")?> คะแนน</p>
            <button class="btn btn-light mb-2 d-block ms-5 me-5 remo w-75" onclick="clearsessionreq('Play')">Play Again.</button>
            <button class="btn btn-light mb-2 d-block ms-5 me-5 remo w-75" onclick="clearsessionreq('Leader')">View Leaderboard.</button>
            <button class="btn btn-light mb-2 d-block ms-5 me-5 remo w-75" onclick="clearsessionreq('Return')">Return to mainmenu.</button>

            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
    
    <?php include ROOT_DIR . "/packlink2.php"?>
</body>
</html>
