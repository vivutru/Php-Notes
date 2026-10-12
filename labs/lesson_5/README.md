# Lesson 5: Decisions in Real Situations

## The big idea
Using if/elseif/else and switch to solve everyday problems: discounts, borrowing rules, delivery fees and user roles.

## Discount rule
"If the total is 5000 or more, give 10% off."

```php
if ($total >= 5000) {
    $discount = $total * 0.10;
    $total = $total - $discount;
} else {
    $discount = 0;
}
```

## Rules with several conditions
A member can borrow only if they are a member **and** have fewer than 5 books:

```php
$canBorrow = ($isMember == true && $booksBorrowed < 5);
```

## Ranges
Delivery charge depends on which band the total falls in:

| Total | Charge |
|---|---|
| under 5000 | 600 |
| 5000 up to 9999 | 300 |
| 10000 or more | 0 |

```php
if ($total < 5000) {
    $deliveryCharge = 600;
} elseif ($total < 10000) {
    $deliveryCharge = 300;
} else {
    $deliveryCharge = 0;
}
```

Because PHP stops at the first true condition, you do not need to repeat `>= 5000` in the second test.

## switch with default
`default` runs when nothing else matches, a safety net for unexpected input.

```php
switch ($role) {
    case "student": echo "Student dashboard"; break;
    case "admin":   echo "Administrator dashboard"; break;
    default:        echo "Unknown role";
}
```

## Good habit: test every path
Change the starting values (the commented-out `//$total = 4000;` lines) to prove each branch works, including edge values like exactly 5000.

## Watch out
- Boundary values: `>=` and `>` give different answers at exactly 5000.
- Always include a `default` or `else` for input you did not expect.
