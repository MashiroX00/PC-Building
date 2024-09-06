<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
$mtclock = microtime();
$mtclock = explode(" ",$mtclock);
$mtclock = $mtclock[1] + $mtclock[0];
$startTime = $mtclock;
$pagelimit = 10;
isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
$start = ($page - 1) * $pagelimit;

$sql = "SELECT * FROM loggeruser LIMIT {$start},{$pagelimit}";
$stmt = $conn->prepare($sql);
$stmt->execute();
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sql1 = "SELECT * FROM loggeruser";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$row = $conn->query($sql1)->fetchColumn();
$rows = $stmt1->rowCount();
$totalPage = ceil($rows / $pagelimit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login event</title>
    <?php include './packlink.php'; ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>
<?php include './proceed/navdisplay.php'; ?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 col-sm-12">
                <h2 class="text-white">Welcome <?php echo $_SESSION['admin'] ?> to login logger</h2>
            </div>
            <div class="col-4 col-sm-12">
                <div class="table-responsive mt-3">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">userID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($row > 0) : ?>
                                <?php foreach ($query as $Data) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $Data['id']; ?>
                                        </td>
                                        <td><?php echo $Data['user_id']; ?>
                                        </td>
                                        <td><?php echo $Data['username']; ?></td>
                                        <td><?php echo $Data['role']; ?></td>
                                        <td><?php echo $Data['time_logger']; ?></td>
                                    </tr>
                                <?php }; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <h4 class="text-center text-warning">ไม่พบในระบบ</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>

                        <caption class="text-white">
                            ดูการ login ทั้งหมด
                        </caption>

                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="<?php $url?>userEvent.php?page=1" aria-label="Previous" class="page-link text-black">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                                <li class="page-item"><a href="<?php $url?>userEvent.php?page=<?php echo $i; ?>" class="page-link text-black"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a href="<?php $url?>userEvent.php?page=<?php echo $totalPage; ?>" aria-label="Next" class="page-link text-black">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php
        $mtclock = microtime();
        $mtclock = explode(" ",$mtclock);
        $mtclock = $mtclock[1] + $mtclock[0];
        $endtime = $mtclock;
        $totalPageLoadTime = ($endtime - $startTime);
        $totalPageLoadTime = round($totalPageLoadTime,3);
        echo "<p class='text-white'>หน้านี้ใช้เวลาโหลด {$totalPageLoadTime} วินาที</p>"  
    ?>
    </div>
    <?php include './packlink2.php'; ?>
</body>

</html>