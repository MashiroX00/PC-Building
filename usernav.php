<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-center align-items-center" href="<?php echo $url?>index.php">
            <img src="<?php echo $url; ?>src/assets/RapeeMEd2-removebg-preview (1).png" alt="" width="60" height="60" class="d-inline-block align-text-top me-1">
            <img src="<?php echo $url; ?>src/assets/รูปโลโก้แผนก.png" alt="" width="60" height="60" class="d-inline-block align-text-top me-3">
            <img src="<?php echo $url; ?>src/assets/305582063_514973683964201_2501104888521175544_n-removebg-preview (3).png" alt="" width="56" height="56" class="d-inline-block align-text-top me-3">
            Basic PC Building Simulator
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <span class="navbar-text">
                Welcome <?php echo $_SESSION['user'] ?>
            </span>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Menu
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Menu Action</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-grid gap-2">
                                <a href="<?php echo $url; ?>index.php" role="button" class="btn btn-outline-primary popover-test" title="Go to Manage Account Page" data-bs-content="">Home</a>
                                <a href="<?php echo $url; ?>Accountinfo.php" role="button" class="btn btn-outline-info popover-test" title="Go to Manage Account Page" data-bs-content="">Accout info</a>
                                <a href="<?php echo $url; ?>proceed/logout.php" role="button" class="btn btn-outline-danger popover-test" title="Destroy Session" data-bs-content="">Logout</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>