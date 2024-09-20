<?php
session_start();
include __DIR__ . '/../proceed/permission.php';
include __DIR__ .'/../conectdb.php';
require_once __DIR__ . '/../Components/alert.php';
$alert = new alert();

isset($_POST['id']) ? $id = $_POST['id'] : $id = null;
$dynamicpath = "proceed/StorageAdding.php";
if (!empty($id)) {
    $sql = "SELECT * FROM storge WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as $item) {
        $Name = $item['Name'];
        $Size = $item['Size'];
        $picture = $item['picture'];
        $detail = $item['detail'];
    }
    $dynamicpath = "proceed/storageedit.php";
}else {
    $Name = "";
    $Size = "";
    $picture = "";
    $detail = "";
}
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
                <form action="<?php echo $url.$dynamicpath?>" method="POST" enctype="multipart/form-data">
                    <?php if (!empty($id)) :?>
                <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hard-drive fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="ID" aria-label="storage" aria-describedby="basic-addon1" name="id" disabled value="<?php echo $id?>">
                        <input type="hidden" class="form-control" placeholder="ID" aria-label="storage" aria-describedby="basic-addon1" name="id" value="<?php echo $id?>">
                    </div>
                    <?php endif;?>
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-hard-drive fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="storage" aria-describedby="basic-addon2" name="name" value="<?php echo $Name?>">
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
                        <input type="text" class="form-control" placeholder="Disk Space (GB only)" aria-label="storage" aria-describedby="basic-addon2" name="size" value="<?php echo $Size?>">
                    </div>
                    <?php if (!empty($id)) :?>
                        <img src="<?php echo $url.$picture?>" alt="" class="img-fluid m-3" style="width: 150px; height: 150px; object-fit: scale-down;"  >
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
                            <button type="submit"" class="btn btn-primary me-2"><span><i class="fa-solid fa-floppy-disk"></i></span> Save edit</a>
                            <?php endif;?>
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