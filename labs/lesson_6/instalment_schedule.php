<?php
$balance = 2400;

echo "<h2>Instalment schedule</h2>";

echo "<ol>";

for ($month = 1; $month <= 4; $month++) {

    $balance -= 600;

    echo "<li>Month " . $month;

    echo ": JMD " . $balance . " left</li>";
}

echo "</ol>";
