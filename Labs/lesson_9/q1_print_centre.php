<?php

// Q1: North Coast Print Studio


// ----------------------------------------- (Functions)


function showHeading()
{
    echo "<h1>North Coast Print Studio</h1>";
}

function isValidPrintJob($job)
{
    if ($job["customer"] === "" || $job["pages"] < 1) {
        return false;
    }
    return $job["mode"] === "mono"
        || $job["mode"] === "colour";
}

function calculatePrintCharge($pages, $mode, $account, $bound)
{
    if ($mode === "mono") {
        $rate = 8;
    } else {
        $rate = 30;
    }
    $printing = $pages * $rate;
    if ($pages >= 100 && $account) {
        $printing *= 0.85;
    }
    if ($bound) {
        $printing += 200;
    }
    return $printing;
}


// ----------------------------------------- (Data array)


$jobs = [
    [
        "id" => "P101",
        "customer" => "Asha James",
        "pages" => 120,
        "mode" => "mono",
        "account" => true,
        "bound" => true
    ],
    [
        "id" => "P102",
        "customer" => "Ben Cole",
        "pages" => 20,
        "mode" => "colour",
        "account" => false,
        "bound" => false
    ],
    [
        "id" => "P103",
        "customer" => "Carla Reid",
        "pages" => 75,
        "mode" => "mono",
        "account" => true,
        "bound" => false
    ],
    [
        "id" => "P104",
        "customer" => "Dwayne Scott",
        "pages" => 100,
        "mode" => "colour",
        "account" => true,
        "bound" => true
    ],
    [
        "id" => "P105",
        "customer" => "Eliana Brown",
        "pages" => 0,
        "mode" => "mono",
        "account" => false,
        "bound" => true
    ]
];


// ----------------------------------------- (Corrections)

$jobs[1]["pages"] = 25;
unset($jobs[3]);
$jobs[] = [
    "id" => "P106",
    "customer" => "Farah Grant",
    "pages" => 100,
    "mode" => "colour",
    "account" => true,
    "bound" => false
];


// ----------------------------------------- (Processing)


$total = 0;
$validCount = 0;
$invalidCount = 0;
$charges = [];
showHeading();

foreach ($jobs as $job) {
    if (!isValidPrintJob($job)) {
        echo $job["id"] . ": Invalid job - excluded.<br>";
        $invalidCount++;
        continue;
    }
    $charge = calculatePrintCharge(
        $job["pages"],
        $job["mode"],
        $job["account"],
        $job["bound"]
    );
    $total += $charge;
    $validCount++;
    $charges[$job["id"]] = $charge;
    $bindingText = $job["bound"] ? "Yes" : "No";
    echo $job["id"] . " | " . $job["customer"];
    echo " | Bound: " . $bindingText;
    echo " | JMD " . number_format($charge, 2) . "<br>";
}


// ----------------------------------------- (Summary)


$average = 0;
if ($validCount > 0) {
    $average = $total / $validCount;
}
echo "Valid jobs: " . $validCount . "<br>";
echo "Invalid jobs: " . $invalidCount . "<br>";
echo "Total: JMD " . number_format($total, 2) . "<br>";
echo "Average: JMD " . number_format($average, 2) . "<br>";

echo "<h2>Charges: highest first</h2>";
arsort($charges);
foreach ($charges as $id => $charge) {
    echo $id . ": JMD " . number_format($charge, 2) . "<br>";
}

$searchId = "P103";
echo "<h2>Charge lookup</h2>";
if (array_key_exists($searchId, $charges)) {
    echo $searchId . ": JMD ";
    echo number_format($charges[$searchId], 2);
} else {
    echo "No valid charge found for " . $searchId;
}
