// R.campbell PHP code

<?php
$itemName = "Headphones";

$price = 3500;
$quantity = 4;
$deliveryFee = 600;


$subtotal = $price * $quantity;
$total = $subtotal;
$total += $subtotal + $deliveryFee;
$isLargeOrder = $quantity >= 5;

echo "Item name: {$itemName}</br>";
echo "Price: $ {$price}</br>";
echo "Quantity: {$quantity}</br>";
echo "Subtotal: {$subtotal}</br>";
echo "Delivery fee: {$deliveryFee}</br>";
echo "Total: {$total}</br>";

var_dump($isLargeOrder);
