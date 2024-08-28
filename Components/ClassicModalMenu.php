<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<i class="fa-solid fa-bars"></i> Menu
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <div class="d-grid gap-2">
          
      <button class="btn btn-primary" data-bs-dismiss="modal">Return to game</button>
        <a href="<?php echo $url?>index.php" class="btn btn-danger">Quit the game</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>