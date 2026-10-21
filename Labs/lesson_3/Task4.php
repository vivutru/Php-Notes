<?php


$hasID = false;
$hasPaidFees = false;
$name = "kayla";

$Grade = 100;

do
if ($Grade >= 90 && $Grade <= 100){
    echo "<br> Your grade is A ";
    $Grade -=10;
    echo " $Grade <br>";
}else if($Grade >= 80 || $Grade == 10){
    echo "<br> Your grade is B  ";
    $Grade -=10;
    echo " $Grade <br>";
}else if ($Grade >= 70){
    echo " <br> Your grade is C  ";
    $Grade -=10;
    echo " $Grade <br>";
}else{
    echo "<br> You have failed D ";
    $Grade -=10;
    echo " $Grade <br> ";
}
while ($Grade > 0);

if ($hasID && $hasPaidFees){
    echo " <br> Welcome to the club";
}else{
    echo " <br> Unfortunately you have been rejected";
}







?>