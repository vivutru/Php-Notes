# Lesson 6: Loops (Repeating Tasks)

## The big idea
A loop repeats instructions so you do not have to write them again and again. Selling 8 tickets at JMD 500 each does not need 8 copies of the same line.

## for loop
Use when you know **how many times** to repeat.

```php
for ($ticket = 1; $ticket <= 8; $ticket++) {
    $total += 500;
}
```

Three parts: start (`$ticket = 1`), keep going while (`$ticket <= 8`), step (`$ticket++` adds 1).

## while loop
Use when you repeat **until something changes**, not a fixed count.

```php
while ($fund < 5000) {
    $fund += 900;
    $week++;
}
```

The condition is checked **before** each round, so it might never run.

## do-while loop
Runs the body **first**, then checks. It always runs at least once.

```php
do {
    $trip++;
    $remaining -= $load;
} while ($remaining > 0);
```

## Which one?
| Situation | Loop |
|---|---|
| Known number of repeats | `for` |
| Repeat until a goal is met | `while` |
| Must run at least once | `do-while` |

## break and continue
- `continue` skips the rest of this round and moves to the next.
- `break` stops the loop completely.

In `booking_numbers.php`, number 5 is skipped, and the loop stops at 10.

## Handy tricks
- `$x++` adds 1. `$x -= 5` takes 5 away.
- `$remaining < 5` check: send only what is left on the last trip so the count never goes negative.

## Watch out
- **Infinite loops.** If the condition never becomes false (you forgot `$stock -= $sold`), the page hangs.
- Off-by-one errors: `<= 8` runs 8 times, `< 8` runs 7.
- Set counters like `$total = 0` **before** the loop, not inside it.
