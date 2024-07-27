<?php
session_start();
include __DIR__ .'/../proceed/permission.php';
include __DIR__ .'/../conectdb.php';
include __DIR__ . "/../Components/alert.php";
$error1 = new alert();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cpu Add</title>
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
                    CPU.
                </p>
                <?php
                $error1->showalert();
                $error1->unsetalert();
                ?>
                <form action="<?php echo $url?>proceed/itemadding.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-microchip fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="storage" aria-describedby="basic-addon2" name="name">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-clock fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Ghz" aria-label="storage" aria-describedby="basic-addon2" name="ghz">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-list fa-xl"></i></label>
                        <select class="form-select" id="inputGroupSelect01" name="socket">
                            <option value="0">Choose Socket</option>
                            <option value="1">AM4</option>
                            <option value="2">AM5</option>
                            <option value="3">LGA1700</option>
                            <option value="4">LGA1200</option>
                            <option value="5">LGA1151</option>
                            <option value="6">LGA1150</option>
                            <option value="7">LGA1155</option>
                            <option value="8">LGA1156</option>
                            <option value="9">LGA2066</option>

                        </select>
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