<?php

$total = 6000;
$discount = $total * 0.10;
if ($total >= 5000){
    $subtotal = $total - $discount;
    echo"Your total is: $$subtotal  with a discount of: $$discount"; 
}else if ($total < 5000){
    $subtotal = $total;
    echo"Your total is: $ $subtotal ";
}

//
?>