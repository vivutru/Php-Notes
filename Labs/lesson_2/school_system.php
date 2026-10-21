<?php
$average=67;
$attendance=82;
$feespaid=true;

$permitted=$average>=50 && $attendance >=75;
$canRegister=$permitted && $feespaid;

var dump($permitted);
var dump($canRegister);
?>
