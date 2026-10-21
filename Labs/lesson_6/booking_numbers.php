<?php
$issued = 0;

for ($n = 1; $n <= 12; $n++) {

    if ($n == 5) {

        continue;
    }

    if ($n == 10) {

        break;
    }

    echo $n . " ";

    $issued++;
}

echo "<br>Issued: " . $issued;
