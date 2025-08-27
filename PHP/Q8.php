<?php

$principal = 10000; 
$rate = 5;          
$time = 2;          
$simple_interest = ($principal * $rate * $time) / 100;

echo "Principal Amount: " . $principal . "<br>";
echo "Rate of Interest: " . $rate . "%<br>";
echo "Time Period: " . $time . " years<br>";
echo "Simple Interest: " . $simple_interest;
?>
