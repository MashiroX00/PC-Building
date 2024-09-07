<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
$sql = $conn->prepare("SELECT * FROM useraccount");
$sql->execute();
$rowcount = $sql->rowCount();

//Math Statistic
function Xbar($data)
{
    $n = count($data);
    if ($n == 0) return 0;

    $sum = array_sum($data);
    return $sum / $n;
}

function std($data)
{
    $n = count($data);
    if ($n == 0) return 0;

    $mean = Xbar($data);
    $sumofsequence = 0;

    foreach ($data as $value) {
        $sumofsequence += pow($value - $mean, 2);
    }
    return sqrt($sumofsequence / $n);
}

$game = "Timer";
$Que = "SELECT career.score FROM career WHERE career.Game_type = ?";
$Statis = $conn->prepare($Que);
$Statis->execute([$game]);
$Statistic = $Statis->fetchAll(PDO::FETCH_ASSOC);
$score = array_column($Statistic, 'score');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <?php include './packlink.php'; ?>
    <link rel="stylesheet" href="<?php echo $url; ?>css/admin.css">
    <script>
        const url1 = "http://localhost/PC-Building/";

        function fetchSystemUsage() {
            fetch(url1 + 'Components/system_usage.json')
                .then(response => response.json())
                .then(data => {
                    var cpuload = document.getElementById('cpu1');
                    var memoload = document.getElementById('memory1');
                    var numemo = document.getElementById('numbericmemory');
                    cpuload.setAttribute('aria-valuenow', data.cpuUsage);
                    cpuload.style.width = data.cpuUsage + "%";
                    cpuload.textContent = data.cpuUsage + "%";
                    memoload.setAttribute('aria-valuenow', data.memoryUsage);
                    memoload.style.width = data.memoryUsage + "%";
                    memoload.textContent = data.memoryUsage + "%";
                    numemo.textContent = (data.totalmemory / 1024).toFixed(2) + "/" + (data.maxmemory / 1024).toFixed(0) + "GB";
                    console.log("Fectching")
                })
                .catch(error => console.error('Error fetching system usage:', error));
        }

        // เรียกใช้ฟังก์ชันแรกครั้งแรกเมื่อโหลดหน้าเว็บ
        window.onload = fetchSystemUsage;

        function callPhpFunction() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url1 + 'Components/ServerLoad.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            console.log('write success');
                            document.getElementById('Load').style.display = 'block';
                            document.getElementById('loading').style.display = 'none';
                            fetchSystemUsage();
                        } else {
                            console.log('Failed to write data.');
                            document.getElementById('Load').style.display = 'block';
                            document.getElementById('loading').style.display = 'none';
                            fetchSystemUsage();
                        }
                    } catch (e) {
                        console.error('Parsing error:', e);
                        document.getElementById('Load').style.display = 'block';
                        document.getElementById('loading').style.display = 'none';
                    }
                } else {
                    console.error('Request failed. Status:', xhr.status);
                    document.getElementById('Load').style.display = 'block';
                    document.getElementById('loading').style.display = 'none';
                }
            };

            xhr.send('action=runFunction');
        }
    </script>

</head>

<body>
    <?php include './proceed/navdisplay.php'; ?>
    <div class="container mt-5">
        <h2 class="text-white mb-3">Welcome <?php echo $_SESSION['admin'] ?> to dashboard</h2>
        <div class="row">
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Item Management <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="card-text">View Delete or Edit user.</p>
                        <a href="<?php echo $url; ?>itemaddform.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4 ">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">User Management <i class="fa-solid fa-user-pen"></i></h5>
                        <p class="card-text">View Delete or Edit user.</p>
                        <a href="<?php echo $url; ?>Usermanage.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Infomation Management <i class="fa-solid fa-circle-info"></i></h5>
                        <p class="card-text">View Delete or Edit Infomation.</p>
                        <a href="<?php echo $url; ?>infomationAdd.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">View User Login <i class="fa-solid fa-users"></i></h5>
                        <p class="card-text">View user login event.</p>
                        <a href="<?php echo $url; ?>userEvent.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total User Registe <i class="fa-solid fa-user"></i>r</h5>
                        <p class="card-text">Now : <?php echo $rowcount ?> User</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Statistics <i class="fa-solid fa-calculator"></i></h5>
                        <p class="card-text">X-bar : <?php echo round(Xbar($score), 2) ?></p>
                        <p class="card-text">Standart Deviation : <?php echo round(std($score), 3) ?> </p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Monitor(Client-side)<i class="fa-solid fa-gauge"></i></h5>
                        <p class="card-text"><i class="fa-solid fa-memory"></i> Memory Usege:
                        <div class="progress" style="width: 80%;">
                            <div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" id="memory">100%</div>
                        </div>
                        </p>
                        <p class="card-text"><i class="fa-solid fa-microchip"></i> Cpu Usege:
                        <div class="progress" style="width: 80%;">
                            <div class="progress-bar text-dark overflow-visible progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" id="cpu">100%</div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-4">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Monitor(Server-side) <i class="fa-solid fa-gauge"></i></h5>
                        <p class="card-text"><i class="fa-solid fa-memory"></i> Memory Usege: <span class="card-text" id="numbericmemory">

                            </span>
                        <div class="progress" style="width: 80%;">
                            <div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" id="memory1">100%</div>
                        </div>

                        </p>
                        <p class="card-text"><i class="fa-solid fa-microchip"></i> Cpu Usege:
                        <div class="progress" style="width: 80%;">
                            <div class="progress-bar text-dark overflow-visible progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" id="cpu1">100%</div>
                        </div>
                        <button onclick="callPhpFunction()" class="btn btn-primary mt-3" id="Load">Run Server Load</button>
                        <div class="spinner-grow text-primary mt-3" role="status" style="display: none;" id="loading">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        </p>
                        <p class="card-text" id="timer">
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './packlink2.php'; ?>
    <script src="<?php echo $url . "monitor.js" ?>"></script>
    <script>
        var btnload1 = document.getElementById('Load');
        const result = document.getElementById('result');
        const statusload = document.getElementById('loading');
        var timeleft = 30;
        btnload1.addEventListener('click', (event) => {
            event.target.style.display = 'none';
            statusload.style.display = 'block';

        })
        async function load() {
                    await callPhpFunction();
                }
        function reload() {
            
            if (timeleft == 0) {
                timeleft += 30;
                load();
                document.getElementById('timer').innerHTML = "จะโหลดทรัพยากรใหม่ใน " + timeleft + " วินาที";
                setTimeout(reload,1000)
            }else {
                timeleft--;
                document.getElementById('timer').innerHTML = "จะโหลดทรัพยากรใหม่ใน " + timeleft + " วินาที";
                setTimeout(reload,1000);
            }
        }
        reload();
    </script>
</body>

</html>