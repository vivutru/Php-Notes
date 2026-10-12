# Lesson 7: Arrays and foreach

## The big idea
An **array** is a list of values stored under one name, like a column of marks. `foreach` walks through the list one item at a time.

## Making an array
```php
$marks = [78, 45, 92, 61, 33, 70];
```

Each item has a position number called an **index**, starting at **0**, not 1. So `78` is index 0.

## foreach
"For each item in the list, do this."

```php
foreach ($marks as $index => $mark) {
    $studentNumber = $index + 1;
    echo "Student $studentNumber: $mark";
}
```

`$index => $mark` gives you both the position and the value. Add 1 to the index when you want human-friendly numbering.

## Counting as you go
Counters start at 0 and change inside the loop:

```php
if ($mark >= 50) { $passCount++; } else { $failCount++; }
```

## Running totals
```php
$totalUsed += $dataUsed;
$remaining = $dataPlan - $totalUsed;
```

## Stopping early
`break` exits the loop as soon as a limit is hit (like a data plan running out).

## Formatting money
`number_format(15000)` gives `15,000`. `number_format($x, 2)` gives two decimal places.

## Ternary inside real code
```php
$fareType = ($fare > 1500) ? "Long Distance Fare" : "Standard Fare";
```

## New lines
- In a **browser**, use `<br>` for a line break.
- In the **terminal**, use `\n`.

Lesson 7 files use `\n`, so the output looks right in the terminal but runs together in a browser. Use `<br>` (or `<pre>`) for web pages.

## Watch out
- Indexes start at 0.
- `\$` prints a literal dollar sign inside double quotes.
- Reset `$remaining` to 0 if it goes negative, as the data usage example does.
