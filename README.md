## PHP Basics Notes

### 1. Comments
Comments start with **two forward slashes** `//` (not backslashes), or use `/* ... */` for multi-line comments.

```php
// This is a single-line comment
/* This is a
   multi-line comment */
```

### 2. PHP Tags
PHP code is wrapped in an opening tag `<?php` and a closing tag `?>`. Every statement inside the tags must end with a semicolon `;`.

```php
<?php
echo "hello";
?>
```

### 3. Echo
`echo` outputs whatever is inside the quotes/brackets to the page.

```php
<?php
echo "<h1>PHP test</h1>";
echo "<p>PHP is working correctly</p>";
?>
```
You can mix HTML tags directly inside your `echo` strings — PHP will render them as HTML.

### 4. Variables
- Variables start with `$`.
- No need to declare a type — PHP infers the data type from the value assigned (this is called **dynamic typing**).

```php
<?php
$name = "Alice";   // string
$role = "student"; // string
$age  = 19;        // integer
$grade = 87.9;     // float
$pass = true;      // boolean
?>
```

**Variable interpolation:** wrap a variable in `{}` inside a double-quoted string to embed its value directly:
```php
echo "{$name} is a {$age} year old {$role}";
```

### 5. String Concatenation
Use a full stop `.` to join (concatenate) strings and variables together.

```php
echo "Grade: " . $grade . "%";
```
Note: you can use either `{$var}` interpolation *or* `.` concatenation — both achieve similar results, but concatenation is required when mixing types (like numbers) into a string in some contexts.

### 6. The Ternary (Shorthand If-Else)
Format: `(condition ? value_if_true : value_if_false)`

```php
echo ($pass ? "Yes" : "No") . " will move to the next semester.";
```

### 7. Data Types Seen So Far
| Type | Example | Description |
|---|---|---|
| string | `"James"` | Text |
| integer | `19` | Whole number |
| float | `87.9` | Decimal number |
| boolean | `true` / `false` | True or false value |

### 8. Arithmetic Operators
Standard operators: `+` add, `-` subtract, `*` multiply, `/` divide.

```php
<?php
$price = 500;
$amount = 3;
$total = $price * $amount;

echo "Total cost: $" . $total . "<br>";
?>
```
