// R.campbell PHP code

<?php
$name = "Jordan Brown";
$test1 = 65;
$test2 = 78;
$test3 = 57;
$attendance = 80;

$totalGrade = $test1;
$totalGrade += $test2;
$totalGrade += $test3;
$average = $totalGrade / 3;

$decentAverage = $average >= 50;
$decentAttendance = $attendance >= 75;
$eligible = $decentAttendance && $decentAverage = true;

echo "Student: {$name}</br>";
echo "Total grade: Test 1({$test1}) +  test2({$test2}) +  test3({$test3}) = {$totalGrade}</br>";
echo "Average: {$average}</br>";

var_dump($decentAverage);
echo "</br>";
var_dump($greatAverage);
echo "</br>";
var_dump($eligible);
