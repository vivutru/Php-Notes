<?php
$penQty = 10;
$notebookQty = 5;
$folderQty = 4;

$penTotal = $penQty * 120;
$notebookTotal = $notebookQty * 350;
$folderTotal = $folderQty * 200;

$subtotal = $penTotal + $notebookTotal + $folderTotal;

if ($subtotal >= 3000) {
    $discount = $subtotal * 0.10;
} else {
    $discount = 0;
}
$final = $subtotal - $discount;

echo "<h2>Receipt</h2>";
echo "Pens: $penQty x 120 = $penTotal<br>";
echo "Notebooks: $notebookQty x 350 = $notebookTotal<br>";
echo "Folders: $folderQty x 200 = $folderTotal<br>";
echo "Subtotal: JMD $subtotal<br>";
echo "Discount: JMD $discount<br>";
echo "Amount Payable: JMD $final<br>";
?>
