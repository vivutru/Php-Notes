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

$selected = [];
$record = 1;

while (($row = fgetcsv($handle, 0, ',', '"', '')) !== false) {
    $record++;
    if ($row === [null]) {
        continue;
    }
    if (!validStudent($row)) {
        trigger_error("Invalid CSV record $record", E_USER_WARNING);
        continue;
    }
    if ((float)$row[4] >= 10000) {
        $selected[] = $row;
    }
}

if (!feof($handle)) {
    fclose($handle);
    stopWithError('The CSV could not be read to the end.');
}
fclose($handle);

$out = fopen(__DIR__ . '/output/high_balances.csv', 'w');
if ($out === false) { stopWithError('Cannot create CSV'); }

if (fputcsv($out, $expected, ',', '"', '') === false) {
    fclose($out);
    stopWithError('Cannot write CSV header');
}

foreach ($selected as $row) {
    if (fputcsv($out, $row, ',', '"', '') === false) {
        fclose($out);
        stopWithError('Cannot write CSV data');
    }
}

if (!fclose($out)) { stopWithError('Cannot finish CSV'); }

echo 'Exported students: ' . count($selected) . "\n";
