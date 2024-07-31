<?php
$data = $_POST['datainfo'] ?? NULL;
if (!empty($data)) {
    $dataArray = json_decode($data,true);

    // ตรวจสอบว่า $dataArray เป็น array
    if (is_array($dataArray)) {
        foreach ($dataArray as $item) {
            // ตรวจสอบว่า $item มี key "id" และ "name"
            if (isset($item["id"]) && isset($item["name"])) {
                echo "ID: " . $item["id"] . " Name: " . $item["name"] . " Type: ". $item["type"] ."</br>";
            } else {
                echo "Item is missing id or name: " . var_dump($item) . "<br>";
            }
        }
    } else {
        echo "Invalid data format: " . var_dump($dataArray) . "<br>";
    }
} else {
    echo "No data received.<br>";
}
if (!isset($data)) {
    
}else {
    echo "No data received.<br>";
}
?>
