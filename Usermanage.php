<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
$pagelimit = 5;
isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
$start = ($page - 1) * $pagelimit;
$sql = "SELECT * FROM useraccount LIMIT {$start},{$pagelimit}";
$stmt = $conn->prepare($sql);
$stmt->execute();
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql1 = "SELECT * FROM useraccount";
$stmt = $conn->prepare($sql1);
$stmt->execute();
$row = $conn->query($sql1)->fetchColumn();
$rows = $stmt->rowCount();
$totalPage = ceil($rows / $pagelimit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <?php include './packlink.php'; ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>

<body>
    <?php include './proceed/navdisplay.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 col-sm-12">
                <h2 class="text-white mb-3">Welcome <?php echo $_SESSION['admin'] ?> to User Manager</h2>
                <?php if (isset($_SESSION["success"])) { ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION["success"];
                        unset($_SESSION["success"]);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION["error"])) { ?>
                    <div class="alert alert-warning">
                        <?php
                        echo $_SESSION["error"];
                        unset($_SESSION["error"]);
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-4 col-sm-12">
                <div class="table-responsive mt-3">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Tel.</th>
                                <th scope="col">Role</th>
                                <th scope="col">Register Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($row > 0) : ?>
                                <?php foreach ($query as $Data) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $Data['user_id']; ?>
                                        </td>
                                        <td><?php echo $Data['username']; ?>
                                        </td>
                                        <td><?php echo $Data['email']; ?></td>
                                        <td><?php echo $Data['firstname']; ?></td>
                                        <td><?php echo $Data['lastname']; ?></td>
                                        <td><?php echo $Data['tel']; ?></td>
                                        <td><?php echo $Data['role']; ?></td>
                                        <td><?php echo $Data['date']; ?></td>
                                        <td>
                                            <form method="post" action="<?php echo $url ?>UsermanageEdit.php" style="display: inline;">
                                                <input name="id" type="hidden" value="<?php echo $Data['user_id']; ?>">
                                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                            </form>
                                            <form method="post" action="<?php echo $url ?>proceed/userdelete.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete <?php echo $Data['username']; ?>?');">
                                                <input type="hidden" value="<?php echo $Data['user_id'] ?> " name="id">
                                                <!-- need to return confirm value to delete -->
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9">
                                        <h4 class="text-center text-warning">ไม่พบในระบบ</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>

                        <caption class="text-white">
                            ดูข้อมูลผู้ใช้ทั้งหมด
                        </caption>

                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="<?php $url?>Usermanage.php?page=1" aria-label="Previous" class="page-link text-black">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                                <li class="page-item"><a href="<?php $url?>Usermanage.php?page=<?php echo $i; ?>" class="page-link text-black"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a href="<?php $url?>Usermanage.php?page=<?php echo $totalPage; ?>" aria-label="Next" class="page-link text-black">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php include './packlink2.php'; ?>
</body>

</html>