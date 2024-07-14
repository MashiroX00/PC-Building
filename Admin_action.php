<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
$sql = $conn->prepare("SELECT * FROM useraccount");
$sql->execute();
$rowcount = $sql->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <?php include './packlink.php'; ?>
    <link rel="stylesheet" href="<?php echo $url; ?>css/admin.css">
</head>

<body>
    <?php include './proceed/navdisplay.php'; ?>
    <div class="container mt-5">
        <h2 class="text-white mb-3">Welcome <?php echo $_SESSION['admin']?> to dashboard</h2>
        <div class="row">
            <div class="col-4 col-sm-3 mb-3">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Item Management <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="card-text">View Delete or Edit user.</p>
                        <a href="<?php echo$url;?>itemaddform.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-3">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">User Management <i class="fa-solid fa-user-pen"></i></h5>
                        <p class="card-text">View Delete or Edit user.</p>
                        <a href="<?php echo $url;?>Usermanage.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-3">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Infomation Management <i class="fa-solid fa-circle-info"></i></h5>
                        <p class="card-text">View Delete or Edit Infomation.</p>
                        <a href="<?php echo $url;?>infomationAdd.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-3">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">View User Login <i class="fa-solid fa-users"></i></h5>
                        <p class="card-text">View user login event.</p>
                        <a href="<?php echo $url;?>userEvent.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-3 mb-3">
                <div class="card h-100 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total User Register</h5>
                        <p class="card-text">Now : <?php echo $rowcount?> User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './packlink2.php'; ?>
</body>

</html>