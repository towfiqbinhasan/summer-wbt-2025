<?php


$a = 10;
$b = 20;

echo "Before Swapping: a = $a, b = $b<br>";


$a = $a + $b; 
$b = $a - $b; 
$a = $a - $b; 

echo "After Swapping: a = $a, b = $b";
?>
