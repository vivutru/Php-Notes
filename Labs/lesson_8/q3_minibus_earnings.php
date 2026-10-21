<?php
$trips = array(12, 15, 9, 16, 7, 14);
$fare = 200;
$capacity = 15;
$fuel = 4500;
$totalPassengers = 0;
$validTrips = 0;

echo "<h2>Minibus Earnings</h2>";
foreach ($trips as $i => $count) {
    if ($count < 0 || $count > $capacity) {
        echo "Trip " . ($i + 1) . ": $count passengers - Invalid<br>";
    } else {
        $earnings = $count * $fare;
        echo "Trip " . ($i + 1) . ": $count passengers - JMD $earnings<br>";
        $totalPassengers += $count;
        $validTrips++;
    }
}

$totalEarnings = $totalPassengers * $fare;
$remaining = $totalEarnings - $fuel;

echo "<br>Valid trips: $validTrips<br>";
echo "Total passengers: $totalPassengers<br>";
echo "Total earnings: JMD $totalEarnings<br>";
echo "Remaining after fuel: JMD $remaining<br>";

if ($totalEarnings >= $fuel) {
    echo "Earnings covered fuel: Yes<br>";
} else {
    echo "Earnings covered fuel: No<br>";
}
?>
