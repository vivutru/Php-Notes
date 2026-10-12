# Lesson 4: Operators, Precedence and Logic

## The big idea
Rules for **which part of a calculation happens first**, shortcuts for updating variables, and the AND / OR / NOT of conditions.

## Order of operations (precedence)
Just like maths class, from first to last:

1. Brackets `( )`
2. Power `**`
3. Multiply, divide, remainder `*  /  %` (left to right)
4. Add, subtract `+  -`

```php
8 + 4 * 3     // 20 (multiply first)
(8 + 4) * 3   // 36 (brackets first)
```

When unsure, add brackets. They cost nothing and make the code clearer.

## Shortcut operators
Update a variable using its own value:

| Shortcut | Same as |
|---|---|
| `$b += 450` | `$b = $b + 450` |
| `$b -= 300` | `$b = $b - 300` |
| `$b *= 2` | `$b = $b * 2` |
| `$b /= 3` | `$b = $b / 3` |

## Comparing
`>` `>=` `<` `<=` `==` (equal) `!=` (not equal). The answer is always true or false.

## Logic
| Symbol | Word | Meaning |
|---|---|---|
| `&&` | AND | both sides true |
| `\|\|` | OR | at least one side true |
| `!` | NOT | flips true to false and back |

## Watch out (the big one)
- **`=` stores, `==` compares.** In your files, `$hasID = true` inside a condition *stores* true instead of checking it. Write `$hasID == true` or just `$hasID`.
- Using a variable you never created (like `$greatAverage`) gives a warning.
- `$total = $subtotal; $total += $subtotal + $deliveryFee;` counts the subtotal **twice**. Use `$total = $subtotal + $deliveryFee;`.
- Shorthand comments need care: `12 % 5` is **2** (the remainder), not "2 mod 2".
