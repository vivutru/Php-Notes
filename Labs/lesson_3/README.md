# Lesson 3: Making Decisions (if, else, switch, do-while)

## The big idea
Up to now the program ran top to bottom with no choices. Now it can **decide** what to do.

## if / else
"If this is true, do that. Otherwise, do something else."

```php
if ($book_available > 0) {
    echo "Available";
} else {
    echo "Not available";
}
```

## else if (more than two outcomes)
PHP checks each condition in order and uses the **first one that is true**.

```php
if ($total >= 5000) {
    // discount
} else if ($total < 5000) {
    // no discount
}
```

## Combining conditions
- `&&` both must be true
- `||` at least one must be true

```php
if ($Grade >= 90 && $Grade <= 100) { ... }
```

## switch
A neat alternative when you are matching **one value** against a list of exact options, like days of the week.

```php
switch ($day) {
    case "Friday":
        echo "Just 1 more day";
        break;
}
```

`break` stops PHP from running into the next case.

## do-while
Does the action **first**, then checks whether to repeat. It always runs at least once.

```php
do {
    // grade message
    $Grade -= 10;
} while ($Grade > 0);
```

## Watch out
- `case "sunday"` will never match the value `"Sunday"`. Text must match exactly, including capital letters.
- Forgetting `break` makes switch keep going into the next case.
- Putting `$$subtotal` in a string prints a dollar sign followed by the value. That is fine on purpose, but easy to do by accident.
- Use `return;` carefully inside a switch. It ends the whole script, not just the switch.
