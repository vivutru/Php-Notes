<?php
$balance = 15000;
$withdrawals = [2000, 4000, 20000, 3000, 1000];

echo "=== ATM Withdrawals ===\n";
echo "Starting balance: \$" . number_format($balance) . "\n\n";

foreach ($withdrawals as $index => $amount) {
    $requestNumber = $index + 1;
    echo "Request $requestNumber: \$" . number_format($amount) . "\n";

    if ($amount > $balance) {
        echo "Transaction Declined — Insufficient Funds\n";
    } else {
        $balance -= $amount;
        echo "Withdrawal successful. New balance: \$" . number_format($balance) . "\n";
    }
    echo "\n";
}

echo "Final account balance: \$" . number_format($balance) . "\n";
?>
