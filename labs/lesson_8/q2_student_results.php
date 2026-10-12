<?php
$marks = array(68, 42, 85, 57, 39, 74, 91, 50);
$passes = 0;
$fails = 0;

echo "<h2>Student Results</h2>";
foreach ($marks as $i => $mark) {
    if ($mark >= 50) {
        $result = "Pass";
        $passes++;
    } else {
        $result = "Fail";
        $fails++;
    }
    echo "Student " . ($i + 1) . ": $mark - $result<br>";
}

$average = array_sum($marks) / count($marks);

echo "<br>Average: $average<br>";
echo "Highest: " . max($marks) . "<br>";
echo "Lowest: " . min($marks) . "<br>";
echo "Passes: $passes<br>";
echo "Failures: $fails<br>";
?>
