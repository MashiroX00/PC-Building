<?php
include './conectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชิ้นส่วนต่างๆของคอมพิวเตอร์</title>
    <link rel="stylesheet" href="<?php echo $url;?>css/info.css">
    <?php
    include './packlink.php'
    ?>
</head>

<body>
    <?php
    include './Navheader.php'
    ?>
    <div class="container">
        <div class="card mb-3 mt-3">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">คอมพิวเตอร์ คืออะไร?</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card mb-3 mt-3">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">แรม(Ram) คืออะไร?</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <?php include './packlink2.php' ?>
</body>

</html>