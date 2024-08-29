<?php
session_start();
include './conectdb.php';
include './proceed/permission.php';
if ($_POST['id']) {
    $id = $_POST['id'];
} else {
    $_SESSION["error"] = "Invalid Item ID";
    header("location: $url" . "itemaddform.php");
}
$sql = "SELECT * FROM useraccount WHERE user_id = (?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $Data) {
    $username = $Data['username'];
    $email = $Data['email'];
    $firstName = $Data['firstname'];
    $lastName = $Data['lastname'];
    $tel = $Data['tel'];
    $role = $Data['role'];
    $date = $Data['date'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <?php include './packlink.php'; ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 col-sm-12">
                <h3 class="text-white mb-3">Welcome <?php echo $_SESSION['admin'] ?> to item management.</h3>
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
                <form action="<?php echo $url; ?>proceed/useredit.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-box-archive"></i></span>
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled name="id" value="<?php echo $id ?>">
                            <input class="form-control" type="hidden" placeholder="Disabled input" aria-label="Disabled input example" name="id" value="<?php echo $id ?>">
                            <label for="id" class="form-label">User id</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="username" value="<?php echo $username ?>">
                            <label for="username" class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="email" value="<?php echo $email ?>">
                            <label for="username" class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-pen"></i></span>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="Firstname" value="<?php echo $firstName ?>">
                            <label for="tag">Firstname</label>
                        </div>
                        <span class="input-group-text"><i class="fa-solid fa-pen"></i></span>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="Lastname" value="<?php echo $lastName ?>">
                            <label for="tag">Lastname</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="tel" value="<?php echo $tel ?>">
                            <label for="username" class="form-label">Tel</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-id-badge"></i></span>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="Role" value="<?php echo $role ?>" disabled>
                            <label for="username" class="form-label">Role</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user-clock"></i></span>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Item" name="date" value="<?php echo $date ?>" disabled>
                            <label for="username" class="form-label">Register Time</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end md-">
                        <button class="btn btn-primary me-md-2" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i>Save item</button>
                        <a href="<?php $url; ?>Usermanage.php" class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark me-1"></i>Cancel</a>
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