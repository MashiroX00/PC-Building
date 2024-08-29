<?php
session_start();
include __DIR__ . '/../proceed/permission.php';
include __DIR__ . '/../conectdb.php';
include __DIR__ . "/../Components/alert.php";
$error1 = new alert();
$item = array(
    "id" => "",
    "Name" => "",
    "Ghz" => "",
    "Socket" => "",
    "img" => "",
    "detail" => ""
);
$editid = $_POST['id'] ?? null;
$text = "";
$trace = "proceed/itemadding.php";
if (!empty($editid)) {
    $stmt = $conn->prepare("SELECT * FROM cpu WHERE id = ?");
    $stmt->execute([$editid]);
    $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rowcount = $conn->prepare("SELECT * FROM cpu WHERE id = ?");
    $rowcount->execute([$editid]);
    $haverow = $rowcount->fetchColumn();
    if ($haverow == false) {
        $error1->setalert("error", "item Id not found.");
        $error1->header("ItemAdd/Cpuadd.php");
        exit;
    }

    foreach ($query as $items) {
        $name = $items["Name"];
        $ghz = $items["Ghz"];
        $socket = $items["Socket"];
        $img = $items["picture"];
        $detail = $items["detail"];
    }
    if ($stmt) {
        $item = array(
            "id" => "{$editid}",
            "Name" => "{$name}",
            "Ghz" => "{$ghz}",
            "Socket" => "{$socket}",
            "img" => "{$img}",
            "detail" => "{$detail}"
        );
        $text = " edit";
        $trace = "proceed/updatecpu.php";
    } else {
        $error1->setalert("error", "item Id not include.");
        $error1->header("ItemAdd/Cpuadd.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cpu Add<?php echo $text?></title>
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
                    CPU<?php echo $text?>.
                </p>
                <?php
                $error1->showalert();
                $error1->unsetalert();
                ?>
                <form action="<?php echo $url.$trace?>" method="POST" enctype="multipart/form-data">
                    <?php if (!empty($item['id'])) : ?>
                        <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-microchip fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="storage" aria-describedby="basic-addon2" name="id" value="<?php echo $item["id"]; ?>">
                    </div>
                    <?php endif?>
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-microchip fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="storage" aria-describedby="basic-addon2" name="name" value="<?php echo $item["Name"]; ?>">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-clock fa-xl"></i></span>
                        <input type="text" class="form-control" placeholder="Ghz" aria-label="storage" aria-describedby="basic-addon2" name="ghz" value="<?php echo $item["Ghz"]; ?>">
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
                    <?php if (!empty($item["img"])) :?>
                            <div class="mb-3">
                                <img src="<?php echo $url.$item["img"];?>" alt="" srcset="" width="100px" height="100px">
                            </div>
                            <?php endif?>
                    <div class="input-group input-group-lg mb-3">
                        <label class="input-group-text" for="inputGroupFile01"><i class="fa-solid fa-image fa-xl"></i></label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                        <input type="hidden" name="path" value="<?php echo $item["img"]?>">
                    </div>

                    <div class="input-group input-group-lg ">
                        <span class="input-group-text"><i class="fa-solid fa-circle-info fa-xl"></i></span>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Detail" name="detail"><?php echo $item["detail"]?></textarea>
                    </div>
                    <div class="float-end mt-3">
                        <button type="submit"" class=" btn btn-primary me-2"><span><i class="fa-solid fa-floppy-disk"></i></span> Save</a>
                            <button type="reset" class="btn btn-warning me-1"><span><i class="fa-solid fa-rotate"></i></span> Reset</button>
                            <a href="<?php echo $url ?>itemaddform.php" class="btn btn-danger"><span><i class="fa-solid fa-x"></i></span> Cancel</a>
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