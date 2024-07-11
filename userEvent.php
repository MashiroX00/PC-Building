<?php
    session_start();
    include './conectdb.php';
    include './proceed/permission.php';
    $sql = "SELECT * FROM loggeruser";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rows = $conn->query($sql)->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login event</title>
    <?php include './packlink.php'; ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>
<?php include './proceed/navdisplay.php'; ?>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 col-sm-12">
                <h2 class="text-white">Welcome <?php echo $_SESSION['admin']?> to login logger</h2>
            </div>
            <div class="col-4 col-sm-12">
            <div class="table-responsive mt-3">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">userID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rows > 0) : ?>
                                <?php foreach ($query as $Data) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $Data['id']; ?>
                                        </td>
                                        <td><?php echo $Data['user_id']; ?>
                                        </td>
                                        <td><?php echo $Data['username']; ?></td>
                                        <td><?php echo $Data['role']; ?></td>
                                        <td><?php echo $Data['time_logger']; ?></td>
                                    </tr>
                                <?php }; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <h4 class="text-center text-warning">ไม่พบในระบบ</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>

                        <caption class="text-white">
                            ดูการ login ทั้งหมด
                        </caption>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include './packlink2.php'; ?>
</body>

</html>