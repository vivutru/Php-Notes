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

function rejectionReason($row, $seenIds) {
    if (count($row) !== 5) {
        return 'Expected 5 fields but found ' . count($row);
    }
    $id = trim($row[0]);
    if (!ctype_digit($id) || (int)$id <= 0) {
        return 'StudentID must be a positive whole number';
    }
    if (trim($row[1]) === '') {
        return 'FullName is missing';
    }
    if (trim($row[2]) === '') {
        return 'Programme is missing';
    }
    $year = trim($row[3]);
    if (!ctype_digit($year) || (int)$year < 1 || (int)$year > 4) {
        return 'YearLevel must be a whole number from 1 to 4';
    }
    if (!is_numeric($row[4])) {
        return 'Balance is not a number';
    }
    if ((float)$row[4] < 0) {
        return 'Balance is negative (' . trim($row[4]) . ')';
    }
    if (isset($seenIds[(int)$id])) {
        return 'Duplicate StudentID ' . $id . ' (first accepted earlier)';
    }
    return null;
}

$path = $argv[1] ?? (__DIR__ . '/data/students_test.csv');
$handle = fopen($path, 'r');
if ($handle === false) {
    stopWithError('Cannot open the audit source CSV.');
}

$expected = ['StudentID', 'FullName', 'Programme',
    'YearLevel', 'Balance'];
$heading = fgetcsv($handle, 0, ',', '"', '');
if ($heading !== $expected) {
    fclose($handle);
    stopWithError('The CSV header is missing or incorrect.');
}

$accepted = [];
$rejectedLines = [];
$seenIds = [];
$source = 0;
$record = 1;

while (($row = fgetcsv($handle, 0, ',', '"', '')) !== false) {
    $record++;
    if ($row === [null]) {
        continue;
    }
    $source++;
    $reason = rejectionReason($row, $seenIds);
    if ($reason !== null) {
        $rejectedLines[] = "Record $record: $reason";
        error_log("Audit rejected record $record: $reason");
        continue;
    }
    $seenIds[(int)trim($row[0])] = true;
    $accepted[] = $row;
}

if (!feof($handle)) {
    fclose($handle);
    stopWithError('The CSV could not be read to the end.');
}
fclose($handle);

$acceptedCount = count($accepted);
$rejectedCount = count($rejectedLines);
if ($acceptedCount + $rejectedCount !== $source) {
    stopWithError('Accepted plus rejected does not equal the source count.');
}

$out = fopen(__DIR__ . '/output/clean_students.csv', 'w');
if ($out === false) {
    stopWithError('Cannot open output/clean_students.csv.');
}
if (fputcsv($out, $expected, ',', '"', '') === false) {
    fclose($out);
    stopWithError('Cannot write the clean CSV header.');
}
foreach ($accepted as $row) {
    if (fputcsv($out, $row, ',', '"', '') === false) {
        fclose($out);
        stopWithError('Cannot write a clean CSV record.');
    }
}
if (!fclose($out)) {
    stopWithError('The clean CSV was not fully saved.');
}

$report = $rejectedLines === []
    ? "No rejected records.\n"
    : implode("\n", $rejectedLines) . "\n";
$rep = fopen(__DIR__ . '/output/rejected_records.txt', 'w');
if ($rep === false) {
    stopWithError('Cannot open output/rejected_records.txt.');
}
$written = fwrite($rep, $report);
$closed = fclose($rep);
if ($written === false || $written !== strlen($report) || !$closed) {
    stopWithError('The rejection report was not fully saved.');
}

$entry = date('Y-m-d H:i:s') . ' | ' . basename($path)
    . " | source=$source accepted=$acceptedCount rejected=$rejectedCount\n";
$hist = fopen(__DIR__ . '/output/audit_history.txt', 'a');
if ($hist === false) {
    stopWithError('Cannot open output/audit_history.txt.');
}
$written = fwrite($hist, $entry);
$closed = fclose($hist);
if ($written === false || $written !== strlen($entry) || !$closed) {
    stopWithError('The audit history entry was not saved.');
}

echo "AUDIT RESULT\n\n";
echo 'Source file: ' . basename($path) . "\n";
echo "Source records: $source\n";
echo "Accepted records: $acceptedCount\n";
echo "Rejected records: $rejectedCount\n";
echo "Saved output/clean_students.csv\n";
echo "Saved output/rejected_records.txt\n";
