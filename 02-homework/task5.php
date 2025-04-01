<?php
$a = 9;
$b = 6;

if ($a % 3 == 0 && $b % 3 == 0) {
    $sum = $a + $b;
    echo "Sum of the numbers: $sum";
} elseif ($b != 0) {
    $division = $a / $b;
    echo "Result of division: $division";
} else {
    echo "Incorrect input";
}
?>