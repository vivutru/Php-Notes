// Sting concatenation
// Concatenation simply means to join together. In php we use a full stop to join strings or variables together
//

<?php

$name = "James"; // This is a string
$age = 19;       // This is an integer
$grade = 87.9;   // This is a float
$pass = true;    // this is a boolean

echo "{$name} is a student at the Brookwood college. <br>";
echo "{$name} is currenly {$age} years old. <br>";
echo "{$name} grade on his last assignment was" . $grade . "% . <br>";

// This is an example of an if else statment
// it reads as (condition ? value_if_true : value_if_false)
echo ($pass ? "Yes" : "No") . " {$name} will move to the next semseter. <br>";

?>
