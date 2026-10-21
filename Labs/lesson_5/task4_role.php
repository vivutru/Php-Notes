<?php

//R.campbell php lesson 5

$role = "student";

// test
// $role = "admin";
// $role = "teacher";

switch($role){
    case "student":
    echo"Student dashboard<br>";
    break;

    case "admin":
    echo"Administrator dashboard<br>";
    break;

    case "teacher":
    echo"Teacher dashboard<br>";
    break;

    // if role doesnt match case run
    default:
    echo"Unknown role";
    break;
}
?>
