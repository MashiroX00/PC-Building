<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Example</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-transparent">
    <div class="container-fluid">
    <a class="navbar-brand d-flex justify-content-center align-items-center" href="#">
            <img src="<?php echo $url;?>src/assets/RapeeMEd2-removebg-preview (1).png" alt="" width="80" height="60" class="d-inline-block align-text-top me-1">
            <img src="<?php echo $url;?>src/assets/รูปโลโก้แผนก.png" alt="" width="60" height="60" class="d-inline-block align-text-top me-3">
            <img src="<?php echo $url;?>src/assets/305582063_514973683964201_2501104888521175544_n-removebg-preview (3).png" alt="" width="56" height="56" class="d-inline-block align-text-top me-3">
            Basic PC Building Simulator
        </a>
      <div class="collapse navbar-collapse justify-content-end">
        <a href="<?php echo $url . "loginUser.php"; ?>" class="btn btn-outline-primary me-2">Login</a>
        <a href="<?php echo $url . "register.php"; ?>" class="btn btn-outline-secondary me-2">Register</a>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>