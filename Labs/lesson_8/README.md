# Lesson 8: Arrays in Depth

## The big idea
Arrays can hold **labelled** items, and PHP has built-in tools to total, count and compare them.

## Two kinds of array
**Indexed** (numbered):
```php
$usage = array(8, 12, 10, 15, 9, 14, 7);
```

**Associative** (labelled with names):
```php
$stock = array("Pens" => 25, "Notebooks" => 8);
```

`array(...)` and `[...]` mean the same thing.

## Looking inside
```php
$stock["Pens"];     // 25
```

## Changing an array
```php
$stock["Notebooks"] += 10;     // change a value
$stock["Rulers"] = 12;         // add a new item
unset($stock["Markers"]);      // remove an item
```

## Built-in helpers
| Function | What it does |
|---|---|
| `array_sum($a)` | adds everything up |
| `count($a)` | how many items |
| `max($a)` / `min($a)` | largest / smallest |
| `round($x, 2)` | round to 2 decimal places |

Average = total / count:
```php
$average = array_sum($marks) / count($marks);
```

## Tiered pricing (like an electricity bill)
First 50 units cost one rate, the rest cost another:

```php
$band1 = $band1Units * 30;
$band2 = $band2Units * 45;
$bill  = $band1 + $band2 + 500;   // plus service charge
```

## Validating data
Reject impossible values before using them (a minibus cannot carry more than its capacity):

```php
if ($count < 0 || $count > $capacity) { /* invalid */ }
```

## Watch out
- `unset` removes the item but does not renumber an indexed array.
- Do not divide by `count()` of an empty array. It would divide by zero.
- Doing the same work twice (like computing earnings per trip *and* in total) should give matching answers. Check them.
