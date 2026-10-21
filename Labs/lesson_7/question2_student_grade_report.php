<?php
$marks = [78, 45, 92, 61, 33, 70];

$passCount = 0;
$failCount = 0;

echo "=== Student Grade Report ===\n";

foreach ($marks as $index => $mark) {
    $studentNumber = $index + 1;

    if ($mark >= 70) {
        $result = "Distinction";
    } elseif ($mark >= 60) {
        $result = "Credit";
    } elseif ($mark >= 50) {
        $result = "Pass";
    } else {
        $result = "Fail";
    }

    if ($mark >= 50) {
        $passCount++;
    } else {
        $failCount++;
    }

    echo "Student $studentNumber | Mark: $mark | Result: $result\n";
}

echo "\nStudents who passed: $passCount\n";
echo "Students who failed: $failCount\n";
?>
