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

$path = $argv[1] ?? (__DIR__ . '/data/01_students_demo.csv');
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

$programmes = [];
$count = 0;
$rejected = 0;
$total = 0;
$record = 1;

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

    $programme = trim($row[2]);
    $balance = (float)$row[4];

    if (!isset($programmes[$programme])) {
        $programmes[$programme] = ['StudentCount' => 0, 'TotalBalance' => 0.0];
    }
    $programmes[$programme]['StudentCount']++;
    $programmes[$programme]['TotalBalance'] += $balance;

    $count++;
    $total += $balance;
}

if (!feof($handle)) {
    fclose($handle);
    stopWithError('The CSV could not be read to the end.');
}
fclose($handle);

ksort($programmes);

$out = fopen(__DIR__ . '/output/programme_summary.csv', 'w');
if ($out === false) {
    stopWithError('Cannot open output/programme_summary.csv.');
}

if (fputcsv($out, ['Programme', 'StudentCount', 'TotalBalance'], ',', '"', '') === false) {
    fclose($out);
    stopWithError('Cannot write the programme summary header.');
}

foreach ($programmes as $name => $data) {
    $line = [$name, $data['StudentCount'], number_format($data['TotalBalance'], 2, '.', '')];
    if (fputcsv($out, $line, ',', '"', '') === false) {
        fclose($out);
        stopWithError('Cannot write a programme summary row.');
    }
}

if (!fclose($out)) {
    stopWithError('The programme summary file was not fully saved.');
}

echo "PROGRAMME SUMMARY\n\n";
foreach ($programmes as $name => $data) {
    echo $name . ': ' . $data['StudentCount'] . ' students, JMD '
        . number_format($data['TotalBalance'], 2) . "\n";
}
echo "\nValid students: $count\n";
echo "Rejected records: $rejected\n";
echo 'Total balance: JMD ' . number_format($total, 2) . "\n";
echo "Saved output/programme_summary.csv\n";
