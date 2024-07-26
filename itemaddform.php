<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item management</title>
    <?php include './packlink.php' ?>
    <link rel="stylesheet" href="<?php echo $url; ?>css/item.css">
</head>

<body>
    <?php include "./proceed/navdisplay.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 col-sm-8">
                <h3 class="text mb-3">Welcome <?php echo $_SESSION['admin']; ?> to item management.</h3>
                <?php if (isset($_SESSION["success"])) { ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION["success"];
                        unset($_SESSION["success"]);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION["error"])) { ?>
                    <div class="alert alert-warning">
                        <?php
                        echo $_SESSION["error"];
                        unset($_SESSION["error"]);
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-4 col-sm-6">
                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-microchip fa-xl"></i></span>
                    <input type="text" class="form-control" placeholder="CPU" aria-label="Cpu" aria-describedby="basic-addon1" disabled>
                    <a href="<?php echo $url ?>ItemAdd/Cpuadd.php" class="btn btn-warning"><span><i class="fa-solid fa-plus"></i> เพิ่ม</span></a>
                </div>

                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text" id="basic-addon2"><img src="<?php echo $url ?>src/icon/motherboard.png" alt="" srcset="" style="width: 30px;"></span>
                    <input type="text" class="form-control" placeholder="Mainboard" aria-label="mainboard" aria-describedby="basic-addon2" disabled>
                    <a href="<?php echo $url ?>ItemAdd/Mainboardadd.php" class="btn btn-warning"><span><i class="fa-solid fa-plus"></i> เพิ่ม</span></a>
                </div>

                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-memory fa-lg"></i></span>
                    <input type="text" class="form-control" placeholder="Ram" aria-label="ram" aria-describedby="basic-addon3" disabled>
                    <a href="<?php echo $url ?>ItemAdd/Ramadd.php" class="btn btn-warning"><span><i class="fa-solid fa-plus"></i> เพิ่ม</span></a>
                </div>

                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-hard-drive fa-xl"></i></span>
                    <input type="text" class="form-control" placeholder="Storage" aria-label="storage" aria-describedby="basic-addon2" disabled>
                    <a href="<?php echo $url ?>ItemAdd/storage.php" class="btn btn-warning"><span><i class="fa-solid fa-plus"></i> เพิ่ม</span></a>
                </div>

                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-car-battery fa-xl"></i></span>
                    <input type="text" class="form-control" placeholder="Power Supply" aria-label="psu" aria-describedby="basic-addon2" disabled>
                    <a href="<?php echo $url ?>ItemAdd/powersupply.php" class="btn btn-warning"><span><i class="fa-solid fa-plus"></i> เพิ่ม</span></a>
                </div>
            </div>
            <div class="col-4 col-sm-12">
                <div>
                    <p class="text text-white fs-3">See All Item</p>
                </div>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a type="button" href="<?php $url?>Components/Cpudisplay.php" class="btn btn-outline-primary">Cpu</a>
                    <a type="button" href="<?php $url?>Components/mainboard.php" class="btn btn-outline-primary">Mainboard</a>
                    <a type="button" href="<?php $url?>Components/Ramdisplay.php" class="btn btn-outline-primary">Ram</a>
                    <a type="button" href="<?php $url?>Components/Storage.php" class="btn btn-outline-primary">Storage</a>
                    <a type="button" href="<?php $url?>Components/powersupply.php" class="btn btn-outline-primary">Power Supply</a>
                </div>
            </div>
        </div>
    </div>
    <?php include './packlink2.php' ?>
</body>

</html>