<?php
    session_start();
    include './conectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <?php include './packlink.php';?>
    <link rel="stylesheet" href="<?php echo $url;?>css/admin.css">
</head>
<body>
<?php include './Navheader.php';?>
<?php include './packlink2.php';?>
</body>
</html>