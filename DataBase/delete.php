<?php
include "../DataBase/Confiq.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$id";
    $conn->query($sql);
}
header("Location: index.php");
?>
