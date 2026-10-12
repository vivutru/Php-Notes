# Lesson 2: Environment, Syntax and True/False Questions

## The big idea
Setting PHP up properly and writing clean, error-free scripts. Also meeting **booleans**: answers that are only ever `true` or `false`.

## Running PHP
PHP files must run through a PHP server (for example XAMPP, or `php -S localhost:8000`). Opening the file directly in a browser just shows the code.

## Tidy output
`</br>` and `<br>` both make a new line in the browser. `<center>` and headings can style the output.

## More maths
| Symbol | Meaning | Example (17 and 5) |
|---|---|---|
| `+` | add | 22 |
| `-` | subtract | 12 |
| `*` | multiply | 85 |
| `/` | divide | 3.4 |
| `%` | remainder after dividing | 2 |

Real-life use: working out GCT on a receipt (`$fee = 0.12 * $price`), or area and perimeter of a rectangle.

## Asking yes/no questions
Comparing two things gives `true` or `false`:

```php
$passed = $score >= 50;
```

Combine questions with `&&` (AND, both must be true):

```php
$permitted = $average >= 50 && $attendance >= 75;
```

## var_dump
`var_dump($x)` shows a value **and** its type. It is a debugging tool, because `echo true` just prints `1`.

## Debugging tasks
Typical beginner errors from the debug files:
- missing semicolon `;`
- misspelled function or variable names
- missing quote or bracket

## Watch out
- It is `var_dump`, with an underscore. `var dump` is an error.
- A closing `?>` at the very end of a file is optional, and often better left off.
- Variable names are case-sensitive: `$Name` and `$name` are different boxes.
- Spelling matters in labels too (`$lenght` works only if you spell it the same way every time).
