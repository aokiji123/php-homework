<?php
$a = 5;
$b = 10;
echo "До: a = $a, b = $b\n";

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "Після: a = $a, b = $b\n";
?>