<?php

echo "<center><h1>My First PHP Website</h1></center><br>";
echo "";
echo "";

$name = "Name";
$programme = "Management of Information Systems";
$files = 10;
$progress = 0.01;
$precent = $progress * 100;

echo "<center>{$name} is a student of {$programme}.</br>";
echo "{$name} has created {$files} php files so far.</br>";
echo "We are {$precent}% closer to becoming a true webmaster.</br>";
echo "PHP successfully executed on {$name}'s computer.</center>";
