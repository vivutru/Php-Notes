<?php
$price = 50;
$paid = 250;
$fee = 0.12 * $price;
$subtotal = $paid - ($price + $fee);

echo "User has paid {$paid} for a {$price} item.</br></br>";
echo "Calculation: </br>";
echo "Paid amount ->    $".$paid."</br>";
echo "Price ->          $".$price."</br>";
echo "GCT ->            $".$fee."</br>";
echo "_________________________ </br>";
echo "Subtotal ->    $".$subtotal;
