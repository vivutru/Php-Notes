<?php
$dataPlan = 20;
$sessions = [3, 4, 6, 5, 4];

$totalUsed = 0;

echo "=== Mobile Data Usage ===\n";

foreach ($sessions as $index => $dataUsed) {
    $sessionNumber = $index + 1;
    $totalUsed += $dataUsed;
    $remaining = $dataPlan - $totalUsed;

    if ($remaining < 0) {
        $remaining = 0;
    }

    echo "Session $sessionNumber | Used: $dataUsed GB | Remaining: $remaining GB\n";

    if ($totalUsed >= $dataPlan) {
        echo "Data Limit Reached\n";
        break;
    }
}
?>
