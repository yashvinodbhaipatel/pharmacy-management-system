<?php

$firstName = $_POST['fname'];

if (preg_match('/^[a-zA-Z]+$/',$firstName)) {
    echo "First name is valid.";
} else {
    echo "First name is invalid.";
}

?>

