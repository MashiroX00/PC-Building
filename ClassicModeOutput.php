<?php
session_start();
include  __DIR__ . "/conectdb.php";
include __DIR__ . "/Components/alert.php";
require_once __DIR__ . "/Components/alert.php";
$data = $_POST['datainfo'] ?? NULL;
$worng = $_POST['worngvalue'] ?? null;
$haveitem = true;
$countArray = 0;
$alerts = new alert();
if (!empty($data)) {
    $dataArray = json_decode($data, true);
    $countArray = count($dataArray);
} else {
    $haveitem = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Mode</title>
    <?php include ROOT_DIR . "/packlink.php"; ?>
    <style>
        .info {
            background-color: #85e8ed;
            height: 300px;
            width: 500px;
            overflow-y: scroll;
            overflow-x: hidden;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        .bg-1 {
            background-color: #d0f5f7;
        }

        body {
            background-image: url(./src/assets/pc\ build.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: right;
        }

        .fontsize {
            font-size: 60px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-5"></div>
            <div class="col-4 col-sm-6 mt-5">
                <p class="text fs-1 mt-5 text-white">
                    Your Computer.
                </p>
            </div>
            <div class="col-4 col-sm-4"></div>
            <div class="col-4 col-sm-6">
                <p class="text fs-5 text-white">
                    Computer Part: <?php echo $countArray ?>
                </p>
                <p class="text fs-5 text-white">
                    Total Worng Asignments: <?php echo $worng; ?>
                </p>
            </div>
            <div class="col-4 col-sm-4">

            </div>
            <div class="col-4 col-sm-4">
                <div class="container info ps-1 pe-1 pt-1">
                    <?php if ($haveitem) : ?>
                        <?php foreach ($dataArray as $items) { ?>
                            <div class="container bg-1 mb-1 pb-2">
                                <span class="text fs-4" id="type">
                                    <?php echo $items['type']; ?>:
                                </span><br>
                                <span class="text fs-5">
                                    <img src="<?php echo $url . $items['picture'] ?>" alt="img" width="100px" draggable="false"><br>
                                </span>
                                <span class="text fs-5" id="itemid">
                                    ID: <div class="ItemId d-inline ID" data-info='{"type": "<?php echo $items['type']?>","id": "<?php echo $items['id'];?>"}'><?php echo $items['id']; ?></div>
                                </span><br>
                                <span class="text fs-5">
                                    Name: <?php echo $items['name']; ?>
                                </span>
                            </div>
                        <?php } ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-4 col-sm-4">
            </div>
            <div class="col-4 col-sm-4 ">

            </div>
            <div class="col-4 col-sm-5 mt-5">
                    <div class="d-grid gap-4 col-9 mx-5 ">
                        <a href="<?php echo $url . "ClassicMode.php" ?>" class="btn btn-outline-info text-white" type="button">Play again</a>
                        <?php if ($countArray >= 5) : ?>
                            <button class="btn btn-outline-success text-white" type="submit" id="Save" onclick="Save()">Save your computer</button>
                        <?php else : ?>
                            <button href="<?php echo $url . "index.php" ?>" class="btn btn-outline-danger text-white" type="button" disabled>Cannot Save Your Computer</button>
                        <?php endif ?>
                        <a href="<?php echo $url . "index.php" ?>" class="btn btn-outline-danger text-white" type="button">Return to main menu</a>
                    </div>
            </div>
            <div class="col-4 col-sm-5">
            </div>
        </div>

    </div>
    <?php include ROOT_DIR . "/packlink2.php"; ?>
    <script src="<?php echo $url."GameSystems/GameSaved.js"?>"></script>
</body>

</html>