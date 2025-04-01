<?php
$a = 17;
$b = 3;

if ($b != 0) {
    if ($a % $b == 0) {
        echo "$a divisible by $b";
    } else {
        echo "$a not divisible by $b";
    }
} else {
    echo "You can't divide by zero";
}
?>