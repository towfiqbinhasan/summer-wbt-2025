<?php
$char = 'A';  // Alphabet start

for ($i = 1; $i <= 3; $i++) {
    // (1) Star Print
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "  "; 

    // (2) Number Print 
    for ($k = 1; $k <= (4 - $i); $k++) {
        echo $k . " ";
    }
    echo "  "; 

    // (3) Alphabet Print 
    for ($m = 1; $m <= $i; $m++) {
        echo $char . " ";
        $char++;
    }

    echo "<br>";
}
?>

