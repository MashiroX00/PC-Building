<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
if ($_POST['id']) { $id = $_POST['id']; }else {
    $_SESSION["error"] = "Invalid Item ID";
    header("location: $url"."itemaddform.php");}
    $sql = "SELECT * FROM item WHERE item_id = (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $Data) {
        $ItemName = $Data['item_name'];
        $ItemDetail = $Data['item_detail'];
        $ItemTag = $Data['item_group'];
        $ItemImage = $Data['item_picture'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item management</title>
    <?php include './packlink.php' ?>
    <link rel="stylesheet" href="<?php echo $url; ?>css/item.css">
</head>

<body>
    <?php include "./proceed/navdisplay.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 col-sm-12">
                <h3 class="text mb-3">Welcome {user} to item management.</h3>
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
                <form action="<?php echo $url; ?>proceed/edit.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?php echo $id?>">
                            <input class="form-control" type="hidden" placeholder="Disabled input" aria-label="Disabled input example" name="id" value="<?php echo $id?>">
                            <label for="id" class="form-label">Item id</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-font"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="itemName" value="<?php echo $ItemName?>">
                            <label for="username" class="form-label">Item name</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingInput" placeholder="details" name="detail"><?php echo $ItemDetail?></textarea>
                            <label for="username" class="form-label">Details</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                        <div class="form-floating">
                            <select class="form-select" id="tag" aria-label="Tag" name="group">
                                <option value="ram">Ram</option>
                                <option value="cpu">Cpu</option>
                                <option value="mainboard">Mainboard</option>
                                <option value="storage">Storage</option>
                                <option value="psu">Power supply</option>
                            </select>
                            <label for="tag">Tag</label>
                        </div>
                    </div>
                    <h4 class="text-white">Image:</h4>
                    <img src="<?php echo $Data['item_picture']?>" alt="" width="150px" class="mb-3">
                    <div class="input-group mb-3">
                    
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <div class="form-floating">
                            <input class="form-control form-control" id="formFileLg" type="file" name="image" accept="image/png, image/jpg, image/jpeg">
                            <label for="username" class="form-label">Item picture</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end md-">
                        <button class="btn btn-primary me-md-2" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i>Save item</button>
                        <a href="<?php $url;?>itemaddform.php" class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark me-1"></i>Cancel</a>
                    </div>
                </form>
            </div>
            <div class="col-4 col-sm-12">
                
            </div>
        </div>
    </div>
    <?php include './packlink2.php' ?>
</body>

</html>