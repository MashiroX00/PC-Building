<?php
session_start();
include './conectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $url ?>css/Classic.css">
    <?php
    include './packlink.php';
    ?>
    <Script src="<?php echo $url?>GameSystems/AjaxSender.js"></Script>
</head>
<body >

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-lg-3 border vh-100" style="background-color: #D9D9D9;">
        <h3 class="text text-white text-center m-3">Item(อุปกรณ์)</h3>
      <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        CPU
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "1","name" : "item1", "type" : "cpu"}'>Item1</div>
        <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "11","name" : "item11", "type" : "cpu"}'>Item11</div>
        
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Mainboard
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "2","name" : "item2", "type" : "mainboard"}'>Item2</div></div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Ram
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "3","name" : "item3", "type" : "ram"}'>Item3</div></div>
    </div>
  </div>
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        Storage
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"></div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingfift">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefift" aria-expanded="false" aria-controls="flush-collapsefift">
        Power Supply
      </button>
    </h2>
    <div id="flush-collapsefift" class="accordion-collapse collapse" aria-labelledby="flush-headingfift" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"></div>
    </div>
  </div>
</div>
      </div>
      <div class="col-lg-3 col-lg-6">
        <div class="dropzone" id="dropzone1" data-item-type="cpu">Drop Zone</div>
        <div class="dropzone" id="dropzone2" data-item-type="mainboard">Drop Zone</div>
        <div class="dropzone" id="dropzone3" data-item-type="ram">Drop Zone</div>
        <button onclick="sendXML()" class="btn btn-warning">TEST</button>
      </div>
      <div class="col-lg-3 col-lg-3">
        <div class="float-end">
          <?php
            include './Components/ClassicModalMenu.php';
          ?>
        </div>
      </div>
    </div>
  </div>
  
<?php
    include './packlink2.php';
    ?>
    <script src="<?php echo $url?>GameSystems/Collector.js"></script>
    
</body>
</html>