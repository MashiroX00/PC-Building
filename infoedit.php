<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
if ($_POST['id']) { $id = $_POST['id']; }else {
    $_SESSION["error"] = "Invalid Item ID";
    header("location: $url"."itemaddform.php");}
    $sql = "SELECT * FROM infomationdata WHERE id = (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $Data) {
        $header = $Data['head'];
        $content = $Data['content'];
        $image = $Data['picture'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info management</title>
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
                <h3 class="text-white mt-5">Welcome <?php echo $_SESSION['admin']?> to Edit Infomation Management.</h3>
                
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
                <form action="<?php $url;?>proceed/infoedit.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">  
                        <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?php echo $id?>">
                            <input class="form-control" type="hidden" placeholder="Disabled input" aria-label="Disabled input example" name="id" value="<?php echo $id?>">
                            <label for="id" class="form-label">Info id</label>
                        </div>
                </div>
                <div class="input-group mb-3 ">
                        <span class="input-group-text"><i class="fa-solid fa-font"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="header" name="Header" value="<?php echo $header;?>">
                            <label for="username" class="form-label">Header</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea2" placeholder="content" name="content"><?php echo $content;?></textarea>
                            <label for="floatingTextarea2" class="form-label">Content (10,000 Charactor)</label>
                        </div>
                    </div>
                    <h4 class="text-white">Image</h4>
                    <img src="<?php echo $image;?>" alt="" style="width: 200px;" class="rounded mb-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" class="form-control" id="inputGroupFile01" style="height: 50px;" name="image">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end md-">
                        <button class="btn btn-primary me-md-2" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i>Save</button>
                        <a href="<?php $url;?>infomationAdd.php" class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark me-1"></i>Cancel</a>
                    </div>
                </form>
            </div>
            <div class="col-4 col-lg-12">
            </div>
        </div>
    </div>
    <?php include './packlink2.php' ?>
</body>

</html>