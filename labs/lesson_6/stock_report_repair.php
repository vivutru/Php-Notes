<?php
$stock = 10;

$day = 1;

while ($stock > 0) {

    $sold = 3;

    if ($stock < 3) {

        $sold = $stock;
    }

    $stock -= $sold;

    echo "Day $day: sold $sold; ";

    echo "$stock left<br>";

    $day++;
}
