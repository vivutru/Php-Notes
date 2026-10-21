<?php
$stock = array("Pens" => 25, "Notebooks" => 8, "Folders" => 14, "Markers" => 4);

echo "<h2>Original Stock</h2>";
foreach ($stock as $product => $qty) {
    echo "$product: $qty<br>";
}

$stock["Notebooks"] += 10;
$stock["Folders"] -= 6;
$stock["Rulers"] = 12;
unset($stock["Markers"]);

echo "<h2>Updated Stock</h2>";
$total = 0;
foreach ($stock as $product => $qty) {
    echo "$product: $qty";
    if ($qty < 10) {
        echo " - Reorder needed";
    }
    echo "<br>";
    $total += $qty;
}

echo "<br>Total units remaining: $total<br>";
?>
