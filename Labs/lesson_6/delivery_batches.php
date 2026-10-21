<?php
$remaining = 23;

$trip = 0;

do {

    $trip++;

    $load = 5;

    if ($remaining < 5) {

        $load = $remaining;
    }

    $remaining -= $load;

    echo "Trip $trip: sent $load; ";

    echo "left $remaining<br>";
} while ($remaining > 0);
