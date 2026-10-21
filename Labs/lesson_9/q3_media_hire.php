<?php

// Q3: Drax Hall Media Hire


// ----------------------------------------- (Functions)

function show_heading()
{
    echo "<h1>Drax Hall Media Hire</h1>";
}

function get_rates($equipment)
{
    switch ($equipment) {
        case "projector":
            return 3500;
        case "speaker":
            return 2500;
        case "screen":
            return 1200;
        default:
            return 0;
    }
}

function is_valid_hire($hire)
{
    return $hire["customer"] !== ""
        && get_rates($hire["equipment"]) > 0
        && $hire["days"] >= 1
        && $hire["late_days"] >= 0;
}

function calculate_hire($equipment, $days, $late)
{
    $rate = get_rates($equipment);
    $booked = $days * $rate;
    if ($days >= 4) {
        $booked *= 0.90;
    }
    $latecharge = $late * $rate;
    return $booked + $latecharge;
}


// ----------------------------------------- (Data array)

$hires = [
    ["id" => "R101", "customer" => "Eden Bell", "equipment" => "projector", "days" => 2, "late_days" => 0],
    ["id" => "R102", "customer" => "Faith Brown", "equipment" => "speaker", "days" => 4, "late_days" => 1],
    ["id" => "R103", "customer" => "Kai James", "equipment" => "screen", "days" => 5, "late_days" => 0],
    ["id" => "R104", "customer" => "Luca Cole", "equipment" => "projector", "days" => 0, "late_days" => 0],
];



// ----------------------------------------- (Corrections)

$hires[0]["days"] = 3;
$hires[] = ["id" => "R105", "customer" => "Nora Lewis", "equipment" => "screen", "days" => 1, "late_days" => 2];




// ----------------------------------------- (Processing)

$total = 0;
$validCount = 0;
$invalidCount = 0;
$lateCount = 0;
$charges = [];

show_heading();
echo "<br>";
foreach ($hires as $hire) {
    if (!is_valid_hire($hire)) {
        echo $hire["id"] . ": Invalid hire - excluded.<br>";
        $invalidCount++;
        continue;
    }
    $charge = calculate_hire($hire["equipment"], $hire["days"], $hire["late_days"]);
    $isLate = $hire["late_days"] > 0;
    $total += $charge;
    $validCount++;
    if ($isLate) {
        $lateCount++;
    }
    $charges[$hire["id"]] = $charge;

    echo $hire["id"] . " | " . $hire["customer"] . " | " . $hire["equipment"];
    echo " | JMD " . number_format($charge, 2);
    echo " | " . ($isLate ? "Returned late" : "On time") . "<br>";
}

$average = 0;
if ($validCount > 0) {
    $average = $total / $validCount;
}



// ----------------------------------------- (Summary)

echo "<h2>Summary</h2>";
echo "Valid hires: " . $validCount . "<br>";
echo "Invalid hires: " . $invalidCount . "<br>";
echo "Valid hires returned late: " . $lateCount . "<br>";
echo "Total charges: JMD " . number_format($total, 2) . "<br>";
echo "Average charge: JMD " . number_format($average, 2) . "<br>";

echo "<h2>Ranking </h2>";
arsort($charges);
foreach ($charges as $id => $charge) {
    echo $id . ": JMD " . number_format($charge, 2) . "<br>";
}

$searchId = "R101";
echo "<h2>Invoice lookup</h2>";
if (array_key_exists($searchId, $charges)) {
    echo $searchId . ": JMD " . number_format($charges[$searchId], 2);
} else {
    echo "No valid invoice found for " . $searchId;
}
