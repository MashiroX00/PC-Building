<?php
session_start();
include './conectdb.php';
$query = $conn->query("SELECT * FROM item");
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$rows = $conn->query("SELECT * FROM item")->fetchColumn();

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
    <div class="container">
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
                <form action="<?php echo $url; ?>proceed/itemadding.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="">
                            <label for="id" class="form-label">Item id</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-font"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="itemName">
                            <label for="username" class="form-label">Item name</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingInput" placeholder="details" name="detail"></textarea>
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
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <div class="form-floating">
                            <input class="form-control form-control" id="formFileLg" type="file" name="image" accept="image/png, image/jpg, image/jpeg">
                            <label for="username" class="form-label">Item picture</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end md-">
                        <button class="btn btn-primary me-md-2" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i>Save item</button>
                        <button class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark me-1"></i>Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-4 col-sm-12">
                <div class="text"><h4>Item</h4></div>
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">details</th>
                                <th scope="col">Tag</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rows > 0) : ?>
                                <?php foreach ($data as $Data) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $Data['item_id'] ?>
                                        </td>
                                        <td><?php if (!empty($Data['item_picture'])) : ?>
                                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($Data['item_picture']) . '" alt ="Uploded images" style="width: 100px;">'; ?>
                                            <?php else : ?>
                                                <img src="<?php echo $url; ?>/assets/img/unkown.png" alt="" style="width: 100px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $Data['item_name']; ?>
                                        </td>
                                        <td><?php echo $Data['item_detail']; ?></td>
                                        <td><?php echo $Data['item_group']; ?></td>
                                        <td>
                                            <form method="post" action="<?php echo $url ?>/editproduct.php" style="display: inline;">
                                                <input name="id" type="hidden" value="<?php echo $Data['item_id']; ?>">
                                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                            </form>
                                            <form method="post" action="<?php echo $url ?>/process/deleteproduct.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete <?php echo $Data['item_name']; ?>?');">
                                                <input type="hidden" value="<?php echo $Data['item_id'] ?> " name="id">
                                                <!-- need to return confirm value to delete -->
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <h4 class="text-center text-warning">ไม่พบข้อมูลสินค้าในระบบ</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>

                        <caption>
                            Captions of the table
                        </caption>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include './packlink2.php' ?>
</body>

</html>