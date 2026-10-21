// R.campbell PHP code

<?php

// Main variables
$x = 12;
$y = 5;


// Operation 1
$a = $x + $y * 2;
/* 12 + 5 * 2,
 * 12 + 10,
 * = 22
 */


// Operation 2
$b = ($x + $y) * 2;
/* (12 + 5) * 2,
 * (17) * 2,
 * = 34
*/


// Operation 3
$c = $x % $y;
/* 12 / 5 = 2 mod2
 * = mod 2
*/


// Operation 4
$d = 2 ** 4 + 3;
/* 2^4 = 2*2*2*2 = 16
 * 16 + 3
 * = 19
 */


echo "x = {$x} and y = {$y}</br>";

echo "a: x + y * 2 = {$a}</br>";
echo "b: (x + y) * 2 = {$b}</br>";
echo "c: x % y = {$c}</br>";
echo "d: x^4 + 3 = {$d}</br>";


