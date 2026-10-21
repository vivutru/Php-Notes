<?php
$numberOfItems = 8;
$pricePerItem = 450;
$discountThreshold = 3000;
$discountRate = 0.10;

$subtotal = 0;

echo "=== Supermarket Checkout ===\n";

for ($item = 1; $item <= $numberOfItems; $item++) {
    echo "Item $item: \$$pricePerItem\n";
    $subtotal += $pricePerItem;
}

echo "\nSubtotal: \$" . number_format($subtotal, 2) . "\n";

if ($subtotal >= $discountThreshold) {
    $discountAmount = $subtotal * $discountRate;
    echo "Discount received: Yes\n";
} else {
    $discountAmount = 0;
    echo "Discount received: No\n";
}

$finalAmount = $subtotal - $discountAmount;

echo "Discount amount: \$" . number_format($discountAmount, 2) . "\n";
echo "Final amount to pay: \$" . number_format($finalAmount, 2) . "\n";
?>
