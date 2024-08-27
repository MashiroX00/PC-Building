<?php
session_start();
include './conectdb.php';

$cpu = array("id", "Name", "Ghz", "Socket", "picture");
$mainboard  = array("id", "Name", "Cpu_socket", "Ram_ddr", "picture");
$ram  = array("id", "Name", "ddr", "Size", "bus", "picture");
$storge = array("id", "Name", "Size", "picture", "Type");
$psu = array("id", "Name", "watt", "picture");
$tables = array(
  "cpu" => array(
    "id",
    "Name",
    "Ghz",
    "Socket",
    "picture"
  ),
  "mainboard" => array(
    "id",
    "Name",
    "Cpu_socket",
    "Ram_ddr",
    "picture"
  ),
  "ram" => array(
    "id",
    "Name",
    "ddr",
    "Size",
    "bus",
    "picture"
  ),
  "storge" => array(
    "id",
    "Name",
    "Size",
    "picture",
    "Type"
  ),
  "psu" => array(
    "id",
    "Name",
    "watt",
    "picture"
  )
);
foreach ($tables as $table => $columns) {
  $sql = "SELECT " . implode(",", $columns) . " FROM " . $table;
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $$table = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


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
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-lg-2 border vh-100 overflow-y-scroll sc" style="background-color: #D9D9D9;">
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
                <ul class="list-group list-group-flush">
                  <?php foreach ($cpu as $Cpu) { ?>
                    <li class="list-group-item">
                      <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $Cpu['id']; ?>","name" : "<?php echo $Cpu['Name']; ?>", "type" : "cpu", "picture" : "<?php echo $Cpu['picture'] ?>"}'>
                        <img src="<?php echo $url . $Cpu['picture'] ?>" alt="" width="100px" draggable="false"><br>
                        <span class="text fs-6">Name: <?php echo $Cpu['Name'] ?></span><br>
                        <span class="text fs-6">Ghz: <?php echo $Cpu['Ghz'] ?></span><br>
                        <span class="text fs-6">Socket: <?php echo $Cpu['Socket'] ?></span><br>
                      </div>
                    </li>
                  <?php }; ?>
                </ul>

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
              <div class="accordion-body">
                <ul class="list-group list-group-flush">
                  <?php foreach ($mainboard as $mb) { ?>
                    <li class="list-group-item">
                      <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $mb['id']; ?>","name" : "<?php echo $mb['Name']; ?>", "type" : "mainboard", "picture" : "<?php echo $mb['picture'] ?>"}'>
                        <img src="<?php echo $url . $mb['picture'] ?>" alt="" width="100px" draggable="false"><br>
                        <span class="text fs-6">Name: <?php echo $mb['Name'] ?></span><br>
                        <span class="text fs-6">Ram DDR: <?php echo $mb['Ram_ddr'] ?></span><br>
                        <span class="text fs-6">Cpu Socket: <?php echo $mb['Cpu_socket'] ?></span><br>
                      </div>
                    </li>
                  <?php }; ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Ram
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php foreach ($ram as $rm) { ?>
                  <li class="list-group-item">
                    <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $rm['id']; ?>","name" : "<?php echo $rm['Name']; ?>", "type" : "ram", "picture" : "<?php echo $rm['picture'] ?>"}'>
                      <img src="<?php echo $url . $rm['picture'] ?>" alt="" width="100px" draggable="false"><br>
                      <span class="text fs-6">Name: <?php echo $rm['Name'] ?></span><br>
                      <span class="text fs-6">DDR: <?php echo $rm['ddr'] ?></span><br>
                      <span class="text fs-6">Size: <?php echo $rm['Size'] ?></span><br>
                      <span class="text fs-6">Bus: <?php echo $rm['bus'] ?></span><br>
                    </div>
                  </li>
                <?php }; ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Storage
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php foreach ($storge as $st) { ?>
                  <li class="list-group-item">
                    <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $st['id']; ?>","name" : "<?php echo $st['Name']; ?>", "type" : "storage", "picture" : "<?php echo $st['picture'] ?>"}'>
                      <img src="<?php echo $url . $st['picture'] ?>" alt="" width="100px" draggable="false"><br>
                      <span class="text fs-6">Name: <?php echo $st['Name'] ?></span><br>
                      <span class="text fs-6">Size(GB): <?php echo $st['Size'] ?></span><br>
                      <span class="text fs-6">Type: <?php echo $st['Type'] ?></span><br>
                    </div>
                  </li>
                <?php }; ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingfift">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefift" aria-expanded="false" aria-controls="flush-collapsefift">
                Power Supply
              </button>
            </h2>
            <div id="flush-collapsefift" class="accordion-collapse collapse" aria-labelledby="flush-headingfift" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><?php foreach ($psu as $pu) { ?>
                  <li class="list-group-item">
                    <div class="draggable" id="dragitem1" draggable="true" data-info='{"id" : "<?php echo $pu['id']; ?>","name" : "<?php echo $pu['Name']; ?>", "type" : "psu", "picture" : "<?php echo $pu['picture'] ?>"}'>
                      <img src="<?php echo $url . $pu['picture'] ?>" alt="" width="100px" draggable="false"><br>
                      <span class="text fs-6">Name: <?php echo $pu['Name'] ?></span><br>
                      <span class="text fs-6">Watt: <?php echo $pu['watt'] ?></span><br>
                    </div>
                  </li>
                <?php }; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-lg-9 case container1 container-fluid">
        <div class="dropzone box-1" id="dropzone1" data-item-type="cpu">CPU</div>
        <div class="dropzone box-2" id="dropzone2" data-item-type="mainboard">Mainboard</div>
        <div class="dropzone box-3" id="dropzone3" data-item-type="ram">Ram</div>
        <div class="dropzone box-5" id="dropzone4" data-item-type="storage">Storage</div>
        <div class="dropzone box-4" id="dropzone5" data-item-type="psu">Power Supply</div>

      </div>
      <div class="col-4 col-lg-1">
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
  <script src="<?php echo $url ?>GameSystems/Collector.js"></script>

</body>

</html>