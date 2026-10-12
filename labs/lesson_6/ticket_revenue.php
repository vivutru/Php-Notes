<?php
$total = 0;

for ($ticket = 1; $ticket <= 8; $ticket++) {

    $total += 500;

    echo "Ticket " . $ticket;

    echo ": JMD 500<br>";
}

echo "Revenue: JMD " . $total;
