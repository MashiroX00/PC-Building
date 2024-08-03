<?php
session_start();
include __DIR__ . '/../proceed/permission.php';
include __DIR__ .'/../conectdb.php';
require_once __DIR__ . '/../Components/alert.php';
$alert = new alert();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Add</title>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
    <?php
    include ROOT_DIR . '/packlink.php';
    ?>
</head>

<body>
    <?php
    include ROOT_DIR . '/proceed/navdisplay.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-4 col-lg-6">
                <p class="text text-white fs-2">
                    Storage Add Form.
                </p>
                <?php
                $alert->showalert();
                $alert->unsetalert();
                ?>
                <form action="<?php echo $url?>proceed/StorageAdding.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-hard-drive fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="storage" aria-describedby="basic-addon2" name="name">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-list fa-xl"></i></label>
                        <select class="form-select" id="inputGroupSelect01" name="type">
                            <option value="0">Choose Hard Drive Type</option>
                            <option value="1">HDD</option>
                            <option value="2">SSD SATA</option>
                            <option value="3">Nvme SATA</option>
                            <option value="4">Nvme M.2</option>

                        </select>
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-database fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Disk Space (GB only)" aria-label="storage" aria-describedby="basic-addon2" name="size">
                    </div>
                    
                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupFile01"><i class="fa-solid fa-image fa-xl"></i></label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                    </div>

                    <div class="input-group input-group-lg ">
                        <span class="input-group-text"><i class="fa-solid fa-circle-info fa-xl"></i></span>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Detail" name="detail"></textarea>
                    </div>
                    <div class="float-end mt-3">
                        <button type="submit"" class="btn btn-primary me-2"><span><i class="fa-solid fa-floppy-disk"></i></span> Save</a>
                        <button type="reset" class="btn btn-warning me-1"><span><i class="fa-solid fa-rotate"></i></span> Reset</button>
                        <a href="<?php echo $url?>itemaddform.php" class="btn btn-danger"><span><i class="fa-solid fa-x"></i></span> Cancel</a>
                    </div>
                </form>
            </div>
            <div class="col-4 col-lg-6">

            </div>
            <div class="col-4 col-lg-6"></div>
        </div>
    </div>

    <?php
    include ROOT_DIR . '/packlink2.php';
    ?>
</body>

</html>