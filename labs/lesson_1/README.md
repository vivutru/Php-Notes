# Lesson 1: The Basics (echo, variables, joining text)

## The big idea
PHP is a language that runs on the **server** before a page reaches the browser. You write instructions, PHP follows them, and the browser only sees the result.

## PHP tags
PHP only reads what sits between `<?php` and `?>`. Everything outside is treated as plain text and shown as-is.

```php
<?php
echo "hello";
?>
```

Every instruction ends with a semicolon `;`, like a full stop at the end of a sentence.

## echo
`echo` means "print this". You can put HTML inside it and the browser will treat it as HTML.

```php
echo "<h1>PHP test</h1>";
echo "<p>PHP is working</p>";
```

## Variables
A variable is a **labelled box** that holds information. The label starts with `$`. You never have to say what kind of information goes in the box; PHP works it out.

```php
$name  = "Alice";   // text (string)
$age   = 19;        // whole number (integer)
$grade = 87.9;      // decimal (float)
$pass  = true;      // yes/no (boolean)
```

## Putting variables inside text
Wrap the variable in `{ }` inside double quotes:

```php
echo "{$name} is {$age} years old.";
```

## Joining text (concatenation)
Use a full stop `.` to glue pieces together:

```php
echo "Grade: " . $grade . "%";
```

## The ternary: a one-line if/else
Read it as: *condition ? answer if yes : answer if no*.

```php
echo ($pass ? "Yes" : "No");
```

## Basic maths
`+` add, `-` subtract, `*` multiply, `/` divide.

```php
$total = $price * $amount;
```

## Watch out
- Comments use **forward** slashes `//`, not backslashes.
- A `//` comment written *outside* the `<?php ?>` tags is not a comment to PHP. It will print on the page. Put comments inside the tags.
- A stray character after `?>` (like `/`) gets printed too.
- Missing space in strings: `"grade was" . $grade` prints `grade was87.9`. Add the space inside the quotes.
