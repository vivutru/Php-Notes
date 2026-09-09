<?php

$name = "James";
$age = 19;
$grade = 87.9;
$pass = true;

echo "{$name} is a student at the Brookwood college. <br>";
echo "{$name} is currenly {$age} years old. <br>";
echo "{$name} grade on his last assignment was" . $grade . "% . <br>";
echo ($pass ? "Yes" : "No") . " {$name} will move to the next semseter. <br>";

?>
