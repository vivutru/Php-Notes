<?php

//R.campbell php lesson 5

$total = 5000;

// test
//$total = 4000;
//$total = 6000;

if ($total >= 5000) {
    $discount = $total * 0.10; // discount is 10%
    $total = $total - $discount; // calculate final total after discount
    echo "Discount Applied: " . $discount . "<br>";
    echo "Total: " . $total . "<br>";

// if over 5000
} else {
    $discount = 0;
    echo "Discount Applied: " . $discount . "<br>";
    echo "Total: " . $total . "<br>";
}
?>
