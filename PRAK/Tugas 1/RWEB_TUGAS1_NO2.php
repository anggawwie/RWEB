<?php
// Variabel berisi JSON
$json = '{
    "coffee": {
        "americano": "25000",
        "latte": "20000",
        "hazelnut": "100000"
    }
}';

// Decode JSON ke PHP Object
$obj = json_decode($json);

// Decode JSON ke PHP Array
$arr = json_decode($json, true);

// PHP Object
echo "Harga Americano: " . $obj->coffee->americano . "\n";
echo "Harga Latte: " . $obj->coffee->latte . "\n";
echo "Harga Hazelnut: " . $obj->coffee->hazelnut . "\n\n";

// PHP Array
echo "Harga Americano: " . $arr["coffee"]["americano"] . "\n";
echo "Harga Latte: " . $arr["coffee"]["latte"] . "\n";
echo "Harga Hazelnut: " . $arr["coffee"]["hazelnut"] . "\n";
?>