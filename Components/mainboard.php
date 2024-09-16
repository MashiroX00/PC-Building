<?php
    session_start();
    include __DIR__ . '/../conectdb.php';
    include __DIR__ . '/../proceed/permission.php';

    $pagelimit = 5;
    $page = $_GET['page'] ?? 1;

    $startpage = ($page-1) * $pagelimit;

    $sql = "SELECT * FROM mainboard LIMIT {$startpage},{$pagelimit}";
    $sql1 = "SELECT id FROM mainboard";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $query = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $row = $conn->query($sql1)->fetchColumn();
    $rows = $stmt1->rowCount();
    $totalPage = ceil($rows / $pagelimit);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainboard All Item</title>
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
    <div class="table-responsive mt-3">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">mainboard Picture.</th>
                                <th scope="col">Id</th>
                                <th scope="col">Mainboard Name</th>
                                <th scope="col">Cpu Socket</th>
                                <th scope="col">Ram ddr (Ghz)</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($row > 0) : ?>
                                <?php foreach ($query as $Data) { ?>
                                    <tr>
                                    <td><img src="<?php echo $url. "/" .$Data['picture']; ?>" alt="img" srcset="" style="width: 100px;"></td>
                                        <td>
                                            <?php echo $Data['id']; ?>
                                        </td>
                                        <td><?php echo $Data['Name']; ?>
                                        </td>
                                        <td><?php echo $Data['Cpu_socket']; ?></td>
                                        <td><?php echo $Data['Ram_ddr']; ?></td>
                                        <td><?php echo $Data['detail']; ?></td>
                                        <td>
                                            <form method="post" action="<?php echo $url ?>ItemAdd/Mainboardadd.php" style="display: inline;">
                                                <input name="id" type="hidden" value="<?php echo $Data['id']; ?>">
                                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                            </form>
                                            <form method="post" action="<?php echo $url ?>proceed/deletemainboard.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete <?php echo $Data['id']; ?>?');">
                                                <input type="hidden" value="<?php echo $Data['id'] ?> " name="id">
                                                <!-- need to return confirm value to delete -->
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center text-warning">ไม่พบในระบบ</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="<?php echo $url?>Components/mainboard.php?page=1" aria-label="Previous" class="page-link text-black">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                                <li class="page-item"><a href="<?php echo $url?>Components/mainboard.php?page=<?php echo $i; ?>" class="page-link text-black"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a href="<?php echo $url?>Components/mainboard.php?page=<?php echo $totalPage; ?>" aria-label="Next" class="page-link text-black">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="float-end">
                <a href="<?php echo $url?>itemaddform.php" class="btn btn-Secondary">Back</a>
                </div>
    </div>
    
<?php 
        include ROOT_DIR . '/packlink2.php';
    ?>
</body>
</html>