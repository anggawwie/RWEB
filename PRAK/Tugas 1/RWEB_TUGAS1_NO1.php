<?php
$coffee = array(
    "americano" => 25000,
    "latte" => 20000,
    "hazelnut" => 100000
);
// Encode ke format JSON
$json_coffee = json_encode($coffee);

echo $json_coffee;
?>