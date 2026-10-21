<?php
//R.campbell php lesson 5

$isMember = true;
$booksBorrowed = 4;

// test
//$isMember = true;
//$booksBorrowed = 5;

//$isMember = false;
//$booksBorrowed = 0;

$canBorrow = ($isMember == true && $booksBorrowed < 5);

echo"Can borrow: ".($canBorrow ? "Yes" : "No")."<br>"; //if false the say no else say yes

// outputs if a varaible is true or false
var_dump($isMember);
var_dump($canBorrow);

?>
