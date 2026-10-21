<?php
$usage = array(8, 12, 10, 15, 9, 14, 7);

echo "<h2>Electricity Usage</h2>";
foreach ($usage as $i => $units) {
    echo "Day " . ($i + 1) . ": $units units<br>";
}

$total = array_sum($usage);
$average = $total / count($usage);

echo "<br>Total weekly usage: $total units<br>";
echo "Average daily usage: " . round($average, 2) . " units<br>";

echo "Days over 10 units: ";
foreach ($usage as $i => $units) {
    if ($units > 10) {
        echo "Day " . ($i + 1) . " ";
    }
}
echo "<br>";

if ($total > 50) {
    $band1Units = 50;
    $band2Units = $total - 50;
} else {
    $band1Units = $total;
    $band2Units = 0;
}
$band1 = $band1Units * 30;
$band2 = $band2Units * 45;
$bill = $band1 + $band2 + 500;

echo "<h2>Bill</h2>";
echo "First 50 units ($band1Units x 30): JMD $band1<br>";
echo "Additional units ($band2Units x 45): JMD $band2<br>";
echo "Service charge: JMD 500<br>";
echo "Final bill: JMD $bill<br>";
?>
