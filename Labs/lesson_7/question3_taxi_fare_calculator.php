<?php
$startingFare = 500;
$ratePerKm = 120;
$longDistanceLimit = 1500;
$trips = [2, 5, 8, 11, 14];

$totalEarned = 0;

echo "=== Taxi Fare Calculator ===\n";

foreach ($trips as $tripNumber => $distance) {
    $fare = $startingFare + ($ratePerKm * $distance);
    $totalEarned += $fare;

    $fareType = ($fare > $longDistanceLimit) ? "Long Distance Fare" : "Standard Fare";

    echo "Trip " . ($tripNumber + 1) . ": $distance km | Fare: \$" . number_format($fare) . " | $fareType\n";
}

echo "\nTotal earned: \$" . number_format($totalEarned) . "\n";
?>
