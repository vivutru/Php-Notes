<?php

// Q4: Harbour Skills Training 


// ----------------------------------------- (Functions)

function showHeading()
{
    echo "<h1>Harbour Skills Training</h1>";
}

function is_in_range($value)
{
    return is_numeric($value) && $value >= 0 && $value <= 100;
}

function is_valid_Participant($p)
{
    if ($p["name"] === "" || count($p["scores"]) !== 3) {
        return false;
    }
    foreach ($p["scores"] as $score) {
        if (!is_in_range($score)) {
            return false;
        }
    }
    return is_in_range($p["attendance"]);
}

function calculate_average($scores)
{
    return array_sum($scores) / 3;   // unrounded
}

function get_outcome($average, $attendance)
{
    if ($average >= 80 && $attendance >= 90) {
        return "Distinction";
    }
    if ($average >= 60 && $attendance >= 80) {
        return "Completed";
    }
    return "Follow-up";
}



// ----------------------------------------- (Data array)

$participants = [
    ["id" => "W101", "name" => "Imani Hall",  "scores" => [85, 90, 80],  "attendance" => 95],
    ["id" => "W102", "name" => "Joel Knight", "scores" => [60, 65, 70],  "attendance" => 80],
    ["id" => "W103", "name" => "Keisha Rose", "scores" => [90, 85, 95],  "attendance" => 75],
    ["id" => "W104", "name" => "Malik Reid",  "scores" => [45, 55, 50],  "attendance" => 90],
    ["id" => "W105", "name" => "Nia Blake",   "scores" => [70, 110, 65], "attendance" => 85]
];



// ----------------------------------------- (Corrections)
$participants[3]["scores"][2] = 80;
$participants[] = ["id" => "W106", "name" => "Omar Lewis", "scores" => [60, 60, 60], "attendance" => 80];

$validCount = 0;
$invalidCount = 0;
$counts = ["Distinction" => 0, "Completed" => 0, "Follow-up" => 0];
$sumAverages = 0;
$averages = [];
$outcomes = [];
$followUp = [];

// ----------------------------------------- (Processing)

showHeading();
echo "<br>";
foreach ($participants as $p) {
    if (!is_valid_Participant($p)) {
        echo $p["id"] . ": Invalid record - excluded.<br>";
        $invalidCount++;
        continue;
    }
    $average = calculate_average($p["scores"]);
    $outcome = get_outcome($average, $p["attendance"]);

    $validCount++;
    $sumAverages += $average;
    $counts[$outcome]++;
    $averages[$p["id"]] = $average;
    $outcomes[$p["id"]] = $outcome;
    if ($outcome === "Follow-up") {
        $followUp[] = $p["name"];
    }

    echo $p["id"] . " | " . $p["name"];
    echo " | Average: " . number_format($average, 2);
    echo " | Attendance: " . $p["attendance"] . "%";
    echo " | " . $outcome . "<br>";
}

$groupAverage = 0;
if ($validCount > 0) {
    $groupAverage = $sumAverages / $validCount;
}


// ----------------------------------------- (Summary)

echo "<h2>Summary</h2>";
echo "Valid records: " . $validCount . "<br>";
echo "Invalid records: " . $invalidCount . "<br>";
echo "Distinction: " . $counts["Distinction"] . "<br>";
echo "Completed: " . $counts["Completed"] . "<br>";
echo "Follow-up: " . $counts["Follow-up"] . "<br>";
echo "Group average: " . number_format($groupAverage, 2) . "<br>";

echo "<h2>Averages</h2>";
arsort($averages);
foreach ($averages as $id => $avg) {
    echo $id . ": " . number_format($avg, 2) . "<br>";
}

echo "<h2>Follow up list</h2>";
if (count($followUp) === 0) {
    echo "None";
} else {
    foreach ($followUp as $name) {
        echo $name . "<br>";
    }
}

$searchId = "W103";
echo "<h2>Lookup</h2>";
if (array_key_exists($searchId, $averages)) {
    echo $searchId . ": Average " . number_format($averages[$searchId], 2);
    echo " | " . $outcomes[$searchId];
} else {
    echo "No valid record found for " . $searchId;
}
