<?php
$a = 20;
$b = 35;
$c = 15;

if ($a > $b && $a > $c) {
    echo "The Higest Number is that: $a";
} elseif ($b > $a && $b > $c) {
    echo "The Higest Number is that $b";
} else {
    echo "The Higest Number is that $c";
}
?>