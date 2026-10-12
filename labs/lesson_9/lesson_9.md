# Lesson 9: Functions and Putting It All Together

## The big idea
A **function** is a named recipe you write once and reuse. It keeps big programs tidy and avoids copying code.

## Writing a function
```php
function showHeading()
{
    echo "<h1>North Coast Print Studio</h1>";
}

showHeading();   // use it
```

## Parameters and return
Parameters are the ingredients. `return` hands back the finished result.

```php
function calculate_revenue($passengers, $free, $fare)
{
    return ($passengers - $free) * $fare;
}

$revenue = calculate_revenue(20, 2, 200);
```

## Validation functions
Functions that answer yes/no make the main code easy to read:

```php
function isValidPrintJob($job) { ... return true or false; }

if (!isValidPrintJob($job)) {
    // report it and skip it
    continue;
}
```

## Arrays of arrays
Each record is itself an array with labels. Together they behave like a table:

```php
$jobs = [
    ["id" => "P101", "customer" => "Asha James", "pages" => 120],
    ["id" => "P102", "customer" => "Ben Cole",   "pages" => 20],
];
```

Read a value with `$job["customer"]`. Fix one with `$jobs[1]["pages"] = 25;`.

## The pattern used in every Lesson 9 file
1. Functions
2. Data
3. Corrections (edit, remove or add records)
4. Processing (loop, validate, calculate, count)
5. Summary (totals, averages, ranking, lookup)

## Handy tools used
| Tool | Purpose |
|---|---|
| `arsort($a)` | sort high to low, keeping labels |
| `array_key_exists($k, $a)` | does this label exist? |
| `switch` / `if` inside functions | choose a rate or outcome |
| `===` | strict compare: same value **and** same type |

## Safe averages
Never divide by zero:

```php
$average = 0;
if ($validCount > 0) { $average = $total / $validCount; }
```

## Watch out
- `unset($jobs[3])` leaves a gap in the numbering. A `foreach` still works fine.
- Functions only see what you pass in. Variables outside are not available inside.
- `===` is stricter than `==`. `"5" == 5` is true, but `"5" === 5` is false.
- Keep function names in one style (`camelCase` or `snake_case`). The files currently mix both.
