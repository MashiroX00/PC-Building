<?php
session_start();
include __DIR__ . '/../proceed/permission.php';
include __DIR__ . '/../conectdb.php';
require_once __DIR__ . '/../Components/alert.php';
$alert = new alert();

isset($_POST['id']) ? $id = $_POST['id'] : false;
$dynamicpath = "proceed/RamAdding.php";
if (!empty($id)) {
    $sql = "SELECT * FROM ram WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as $item) {
        $name = $item['Name'];
        $picture = $item['picture'];
        $detail = $item['detail'];
    }
    $dynamicpath = "proceed/ramedit.php";
}else {
    $name = "";
    $picture = "";
    $detail = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ram Add</title>
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
                    Ram Add Form.
                </p>
                <?php
                $alert->showalert();
                $alert->unsetalert();
                ?>
                <form action="<?php echo $url.$dynamicpath?>" method="POST" enctype="multipart/form-data">
                <?php
                            if (!empty($id)) :
                        ?>
                        <div class="input-group input-group-lg mb-3">
                        
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo $url ?>src/icon/motherboard.png" alt="" srcset="" style="width: 30px;"></span>
                        <input type="text" class="form-control" placeholder="ID" aria-label="storage" aria-describedby="basic-addon1" name="id" value="<?php echo $id?>" disabled>
                        <input type="hidden" class="form-control" placeholder="ID" aria-label="storage" aria-describedby="basic-addon1" name="id" value="<?php echo $id?>" >
                    </div>
                        <?php endif?>
                    <div class="input-group input-group-lg mb-3">
                        
                        <span class="input-group-text" id="basic-addon2"><img src="<?php echo $url ?>src/icon/motherboard.png" alt="" srcset="" style="width: 30px;"></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="storage" aria-describedby="basic-addon2" name="name" value="<?php echo $name?>">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-list fa-xl"></i></label>
                        <select class="form-select" id="inputGroupSelect01" name="DDR">
                            <option value="0">Choose RAM Socket</option>
                            <option value="1">DDR3</option>
                            <option value="2">DDR4</option>
                            <option value="3">DDR5</option>

                        </select>
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupSelect02"><i class="fa-solid fa-gauge fa-xl"></i></label>
                        <select class="form-select" id="inputGroupSelect02" name="bus">
                            <option value="0">Choose RAM Bus</option>
                            <option value="1">1333 (DDR3)</option>
                            <option value="2">1600 (DDR3)</option>
                            <option value="3">1866 (DDR3)</option>
                            <option value="4">2133 (DDR4)</option>
                            <option value="5">2400 (DDR4)</option>
                            <option value="6">2666 (DDR4)</option>
                            <option value="7">3000 (DDR4 or above)</option>
                            <option value="8">3200 (DDR4 or above)</option>
                            <option value="9">3600 (DDR4 or above)</option>
                            <option value="10">4800 (DDR5)</option>
                            <option value="11">5200 (DDR5)</option>
                            <option value="12">5600 (DDR5)</option>
                            <option value="13">6000 (DDR5)</option>

                        </select>
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupSelect03"><i class="fa-solid fa-hard-drive fa-xl"></i></label>
                        <select class="form-select" id="inputGroupSelect03" name="size">
                            <option value="0">Choose RAM Size</option>
                            <option value="1">4 GB</option>
                            <option value="2">8 GB</option>
                            <option value="3">16 GB</option>
                            <option value="3">32 GB</option>

                        </select>
                    </div>
                    <?php
                        if (!empty($id)):
                    ?>
                    <img src="<?php echo $url.$picture?>" alt="" class="img-fluid m-3" width="300px">
                    <?php endif?>
                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupFile01"><i class="fa-solid fa-image fa-xl"></i></label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                    </div>

                    <div class="input-group input-group-lg ">
                        <span class="input-group-text"><i class="fa-solid fa-circle-info fa-xl"></i></span>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Detail" name="detail"><?php echo $detail?></textarea>
                    </div>
                    <div class="float-end mt-3">
                        <?php if (empty($id)) :?>
                        <button type="submit"" class="btn btn-primary me-2"><span><i class="fa-solid fa-floppy-disk"></i></span> Save</a>
                        <?php else :?>
                            <button type="submit"" class="btn btn-primary me-2"><span><i class="fa-solid fa-floppy-disk"></i></span> Save Edit</a>
                            <?php endif?>
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