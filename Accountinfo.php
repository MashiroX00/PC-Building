<?php
session_start();
include './conectdb.php';
$status = 0;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} elseif (isset($_SESSION['admin'])) {
    $username = $_SESSION['admin'];
} else {
    $username = "";
}
if ($username != "") {
    $sql = "SELECT * FROM useraccount WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM useraccount";
    $row = $conn->query($sql2)->fetchColumn();
    foreach ($query as $Data) {
        $id = $Data['user_id'];
        $email = $Data['email'];
        $first = $Data['firstname'];
        $last = $Data['lastname'];
        $tel = $Data['tel'];
    }
    $pagelimit = 5;
    isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
    $start = ($page - 1) * $pagelimit;
    $sql1 = "SELECT useraccount.user_id,useraccount.username, useraccount.email, useraccount.firstname, useraccount.lastname, loggeruser.time_logger,useraccount.tel FROM loggeruser INNER JOIN useraccount ON useraccount.user_id = ? ORDER BY useraccount.user_id LIMIT {$start},{$pagelimit}";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$id]);
    $query1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $sql3 = $sql = "SELECT useraccount.user_id,useraccount.username, useraccount.email, useraccount.firstname, useraccount.lastname, loggeruser.time_logger,useraccount.tel FROM loggeruser INNER JOIN useraccount ON useraccount.user_id = ? ORDER BY useraccount.user_id";
    $stmt2 = $conn->prepare($sql3);
    $stmt2->execute([$id]);
    $rows = $stmt2->rowCount();
    $totalPage = ceil($rows/$pagelimit);
    $status = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Infomation</title>
    <?php
    include './packlink.php';
    ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>

<body>
    <?php
    include './proceed/navdisplay.php';
    ?>
    <div class="container mt-3">
        <div class="row">

            <div class="col-4 col-sm-12">

            </div>

            <div class="col-4 col-sm-6">
                <h4 class="text-white">Account Infomation</h4>
                <?php if ($username == "") { ?>
                    <div class="alert alert-danger">โปรด login ก่อนเข้าหน้า Account Infomation. <a href="<?php $url ?>loginUser.php">Login!</a></div>
                <?php } else { ?>
                    <form action="" method="post">
                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?Php echo $id; ?>">
                                <label for="id" class="form-label">UserID</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?Php echo $username; ?>">
                                <label for="id" class="form-label">Username</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?Php echo $email; ?>">
                                <label for="id" class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?Php echo $first; ?>">
                                <label for="id" class="form-label">First Name</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?Php echo $last; ?>">
                                <label for="id" class="form-label">Last Name</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?Php echo $tel; ?>">
                                <label for="id" class="form-label">Tel</label>
                            </div>
                        </div>
                    </form>
                <?php } ?>

            </div>

            <div class="col-4 col-sm-6">
                <h4 class="text-white">Login Time</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($row > 0) : ?>
                                <?php foreach ($query1 as $Data1) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $Data1['username']; ?>
                                        </td>
                                        <td><?php echo $Data1['time_logger']; ?></td>
                                    </tr>
                                <?php }; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center text-warning">ไม่พบในระบบ</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="<?php $url ?>Accountinfo.php?page=1" aria-label="Previous" class="page-link text-black">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                                <li class="page-item"><a href="<?php $url ?>Accountinfo.php?page=<?php echo $i; ?>" class="page-link text-black"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a href="<?php $url ?>Accountinfo.php?page=<?php echo $totalPage; ?>" aria-label="Next" class="page-link text-black">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './packlink2.php';
    ?>
</body>

</html>