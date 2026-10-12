<?php

// Q2: Island Shuttle daily takings


// ----------------------------------------- (Functions)

function showHeading()
{
    echo "<h1>Island Shuttle</h1>";
}

function get_fare($route)
{
    if ($route === "local") {
        return 200;
    } elseif ($route === "express") {
        return 350;
    } elseif ($route === "coastal") {
        return 300;
    }
    return 0;
}

function isValidTrip($trip)
{
    return get_fare($trip["route"]) > 0
        && $trip["passengers"] >= 0 && $trip["passengers"] <= 30
        && $trip["free"] >= 0 && $trip["free"] <= $trip["passengers"];
}

function calculate_revenue($passengers, $free, $fare)
{
    return ($passengers - $free) * $fare;
}


// ----------------------------------------- (Data)
$trips = [
    ["id" => "T01", "route" => "local",   "passengers" => 18, "free" => 2],
    ["id" => "T02", "route" => "express", "passengers" => 30, "free" => 3],
    ["id" => "T03", "route" => "local",   "passengers" => 22, "free" => 2],
    ["id" => "T04", "route" => "coastal", "passengers" => 24, "free" => 4],
    ["id" => "T05", "route" => "express", "passengers" => 34, "free" => 0]
];


// ----------------------------------------- (Corrections)

$trips[0]["passengers"] = 20;
unset($trips[2]);
$trips[] = ["id" => "T06", "route" => "local", "passengers" => 10, "free" => 0];


// ----------------------------------------- (Processing)

$validCount = 0;
$invalidCount = 0;
$totalPassengers = 0;
$fullCount = 0;
$totalRevenue = 0;
$totalSurplus = 0;
$surpluses = [];

showHeading();
foreach ($trips as $trip) {
    if (!isValidTrip($trip)) {
        echo $trip["id"] . ": Invalid trip - excluded.<br>";
        $invalidCount++;
        continue;
    }

    $revenue = calculate_revenue($trip["passengers"], $trip["free"], get_fare($trip["route"]));
    $surplus = $revenue - 2000;
    $full = $trip["passengers"] === 30;

    $validCount++;
    $totalPassengers += $trip["passengers"];
    $totalRevenue += $revenue;
    $totalSurplus += $surplus;
    if ($full) {
        $fullCount++;
    }
    $surpluses[$trip["id"]] = $surplus;

    echo $trip["id"] . " | " . $trip["route"];
    echo " | Revenue: JMD " . number_format($revenue, 2);
    echo " | Surplus: JMD " . number_format($surplus, 2);
    echo " | Full: " . ($full ? "Yes" : "No") . "<br>";
}

// ----------------------------------------- (Summary)

echo "<h2>Summary</h2>";
echo "Valid trips: " . $validCount . "<br>";
echo "Invalid trips: " . $invalidCount . "<br>";
echo "Total passengers: " . $totalPassengers . "<br>";
echo "Full trips: " . $fullCount . "<br>";
echo "Total revenue: JMD " . number_format($totalRevenue, 2) . "<br>";
echo "Total surplus: JMD " . number_format($totalSurplus, 2) . "<br>";

echo "<h2>Surplus</h2>";
arsort($surpluses);
foreach ($surpluses as $id => $surplus) {
    echo $id . ": JMD " . number_format($surplus, 2) . "<br>";
}

$searchId = "T02";
echo "<h2>Surplus lookup</h2>";
if (array_key_exists($searchId, $surpluses)) {
    echo $searchId . ": JMD " . number_format($surpluses[$searchId], 2);
} else {
    echo "No valid surplus found for " . $searchId;
}
