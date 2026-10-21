// R.campbell PHP code

// && mean AND 
// ! mean inverse it makes true false ect 

<?php

$age = 19;
$hasID = true;
$isSuspended = false;

$ageAndID = $age >= 18 && $hasID = true;
$notSuspended = !$isSuspended;
$canEnter = $ageAndID && $notSuspended = true;

var_dump($ageAndID);
var_dump($notSuspended);
var_dump($canEnter);
