<?php
header('Content-Type: text/plain; charset=UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/logs/errors.log');

function stopWithError($message) {
    error_log($message);
    die("The task could not finish. Check logs/errors.log.\n");
}

function validStudent($row) {
    if (count($row) !== 5) {
        return false;
    }
    return ctype_digit(trim($row[0]))
        && (int)$row[0] > 0
        && trim($row[1]) !== ''
        && trim($row[2]) !== ''
        && ctype_digit(trim($row[3]))
        && (int)$row[3] >= 1 && (int)$row[3] <= 4
        && is_numeric($row[4]) && (float)$row[4] >= 0;
}

$path = __DIR__ . '/data/01_students_demo.csv';
$handle = fopen($path, 'r');
if ($handle === false) {
    stopWithError('Cannot open the student CSV.');
}

$expected = ['StudentID', 'FullName', 'Programme',
    'YearLevel', 'Balance'];
$heading = fgetcsv($handle, 0, ',', '"', '');
if ($heading !== $expected) {
    fclose($handle);
    stopWithError('The CSV header is missing or incorrect.');
}

$count = 0;
$rejected = 0;
$total = 0;
$record = 1;

echo "STUDENT BALANCE REPORT\n\n";

while (($row = fgetcsv($handle, 0, ',', '"', '')) !== false) {
    $record++;
    if ($row === [null]) {
        continue;
    }
    if (!validStudent($row)) {
        $rejected++;
        trigger_error("Invalid CSV record $record", E_USER_WARNING);
        continue;
    }
    $count++;
    $balance = (float)$row[4];
    $total += $balance;
    echo $row[0] . ' - ' . trim($row[1]) . ': JMD ';
    echo number_format($balance, 2) . "\n";
}

if (!feof($handle)) {
    fclose($handle);
    stopWithError('The CSV could not be read to the end.');
}
fclose($handle);

$summary = "Valid students: $count\nRejected records: $rejected\n";
$summary .= 'Total balance: JMD ' . number_format($total, 2) . "\n";

$out = fopen(__DIR__ . '/output/summary.txt', 'w');
if ($out === false) {
    stopWithError('Cannot open output/summary.txt.');
}
$written = fwrite($out, $summary);
$closed = fclose($out);
if ($written === false || $written !== strlen($summary) || !$closed) {
    stopWithError('The summary file was not fully saved.');
}

echo "\n" . $summary;
echo "Saved output/summary.txt\n";
