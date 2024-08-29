<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
$pagelimit = 3;
isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
$start = ($page - 1) * $pagelimit;
$sql = "SELECT * FROM infomationdata LIMIT {$start},{$pagelimit}";
$stmt = $conn->prepare($sql);
$stmt->execute();
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql1 = "SELECT * FROM infomationdata";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$row = $conn->query($sql1)->fetchColumn();
$rows = $stmt1->rowCount();
$totalPage = ceil($rows/$pagelimit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item management</title>
    <?php include './packlink.php' ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>

<body>
    <?php include "./proceed/navdisplay.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4 col-lg-12">
                <h3 class="text-white mt-5">Welcome <?php echo $_SESSION['admin']?> to Infomation Management.</h3>
                
            </div>
            <div class="col-4 col-lg-6">
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
                <form action="<?php $url;?>proceed/info.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-font"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="header" name="Header">
                            <label for="floatingInput" class="form-label">Header</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea2" placeholder="content" name="content"></textarea>
                            <label for="floatingTextarea2" class="form-label">Content (10,000 Charactor)</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" class="form-control" id="inputGroupFile01" style="height: 50px;" name="image">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end md-">
                        <button class="btn btn-primary me-md-2" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i>Save</button>
                        <button class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark me-1"></i>Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-4 col-lg-12">
                <h3 class="text-white mt-5">
                    <p>Infomation</p>
                </h3>
            <div class="table-responsive mt-3">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Header</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image Path</th>
                                <th scope="col">Filename</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($row > 0) : ?>
                                <?php foreach ($query as $Data) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $Data['id']; ?>
                                        </td>
                                        <td><img src="<?php echo $Data['picture']; ?>" alt="" style="width: 100px;"></td>
                                        <td><?php echo $Data['head']; ?>
                                        </td>
                                        <td><?php echo $Data['content']; ?></td>
                                        <td><?php echo $Data['picture']; ?></td>
                                        <td><?php echo $Data['FileName']; ?></td>
                                        <td>
                                            <form method="post" action="<?php echo $url ?>infoedit.php" style="display: inline;">
                                                <input name="id" type="hidden" value="<?php echo $Data['id']; ?>">
                                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                            </form>
                                            <form method="post" action="<?php echo $url ?>proceed/infodelete.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete <?php echo $Data['head']; ?>?');">
                                                <input type="hidden" value="<?php echo $Data['id'] ?> " name="id">
                                                <!-- need to return confirm value to delete -->
                                                <button type="submit" class="btn btn-danger mt-1"><i class="fa-solid fa-trash me-1"></i>Delete</button>
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

                        <caption class="text-white">
                            ดูข้อมูล infomation ทั้งหมดในระบบ
                        </caption>

                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="<?php $url?>infomationAdd.php?page=1" aria-label="Previous" class="page-link text-black">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                                <li class="page-item"><a href="<?php $url?>infomationAdd.php?page=<?php echo $i; ?>" class="page-link text-black"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a href="<?php $url?>infomationAdd.php?page=<?php echo $totalPage; ?>" aria-label="Next" class="page-link text-black">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
            </div>
        </div>
    </div>
    <?php include './packlink2.php' ?>
</body>

</html>