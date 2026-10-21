<?php
$fund = 1200;

$week = 0;

while ($fund < 5000) {

    $week++;

    $fund += 900;

    echo "Week " . $week . ": JMD ";

    echo $fund . "<br>";
}

echo "Weeks: " . $week . "<br>";

echo "Final fund: JMD " . $fund;
