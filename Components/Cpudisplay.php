<?php
    session_start();
    include __DIR__ . '/../conectdb.php';
    include __DIR__ . '/../proceed/permission.php';

    $pagelimit = 5;
    $page = $_GET['page'] ?? 1;

    $startpage = ($page-1) * $pagelimit;

    $sql = "SELECT * FROM cpu LIMIT {$startpage},{$pagelimit}";
    $sql1 = "SELECT id FROM cpu";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $query = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare($sql1);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cpu Fetch All</title>
    <?php 
        include ROOT_DIR . 'packlink.php';
    ?>
</head>
<body>
<?php 
        include ROOT_DIR . 'proceed/navdisplay.php';
    ?>

<?php 
        include ROOT_DIR . 'packlink2.php';
    ?>
</body>
</html>