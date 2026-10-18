<?php
function bookingCost(
    $unitPrice,
    $quantity,
    &$bookings,
    $discount = 0
) {
    $unitPrice = $unitPrice * (1 - $discount);
    $total = $unitPrice * $quantity;
    $bookings++;
    return $total;
}

$price = 500;
$bookings = 0;
$first = bookingCost($price, 4, $bookings, 0.10);
$second = bookingCost($price, 2, $bookings);

echo "First: $first<br>Second: $second<br>";
echo "Price: $price<br>Bookings: $bookings";
