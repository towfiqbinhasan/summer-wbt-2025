<?php
// Pattern 1
echo "# Pattern 1<br>";
for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

// Pattern 2
echo "# Pattern 2<br>";
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}

echo "<br>";

// Pattern 3
echo "# Pattern 3<br>";
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j <= $i; $j++) {
        echo chr(65 + $i) . " ";
    }
    echo "<br>";
}
?>
