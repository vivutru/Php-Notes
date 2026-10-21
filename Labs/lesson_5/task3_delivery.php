<?php

//R.campbell php lesson 5

$total = 4999;

// tests
//$total = 5000;
//$total = 9999;
//$total = 10000;

$deliveryCharge = 0;

if ($total < 5000) {
    $deliveryCharge = 600;
} elseif ($total < 10000 && $total >= 5000) { // range between 5000 & 10000
    $deliveryCharge = 300;
} else {
    $deliveryCharge = 0;
}

echo "Delivery Charge = $" . $deliveryCharge . "<br>";
?>
