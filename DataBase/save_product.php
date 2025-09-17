<?php
include "../DataBase/Confiq.php";



if(isset($_POST['save'])) {
    $name = $_POST['name'];
    $buying_price = $_POST['buying_price'];
    $selling_price = $_POST['selling_price'];
    $display = isset($_POST['display']) ? 'Yes' : 'No';

    $sql = "INSERT INTO products (name, buying_price, selling_price, display)
            VALUES ('$name', '$buying_price', '$selling_price', '$display')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully!";
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
