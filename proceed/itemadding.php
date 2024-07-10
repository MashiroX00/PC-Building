<?php
    session_start();
    include '../conectdb.php';

    $_POST['itemName'] ? $itemName = $_POST['itemName'] : header("Location: $url"."itemaddform.php");
    $_POST['detail'] ? $detail = $_POST['detail'] : header("Location: $url"."itemaddform.php");
    $_POST['group'] ? $Itemgroup = $_POST['group'] : header("Location: $url"."itemaddform.php");
    $_FILES['image']['name'] ? $ItemImageName =  $_FILES['image']['name'] : header("Location: $url"."itemaddform.php");
    $_FILES['image']['tmp_name'] ? $ItemImageTmp = $_FILES['image']['tmp_name'] : header("Location: $url"."itemaddform.php");

    if (empty($ItemImageName)) {
        $_SESSION["error"] = "Please Assign the Item image";
        header("Location: $url"."itemaddform.php");
    }else {
        $itemimageData = file_get_contents($ItemImageTmp);
        $sql = $conn->prepare("INSERT INTO item (item_name,item_detail,item_group,item_picture) VALUES (?,?,?,?)");
        $sql->execute([$itemName,$detail,$Itemgroup,$itemimageData]);
    }
    if ($sql) {
        $_SESSION['success'] = "Product saved success";
        header("Location: $url"."itemaddform.php");
    }else {
        $_SESSION["error"] = "Oops something went wrong. Please try again later.";
        header("Location: $url"."itemaddform.php");
    }
?>