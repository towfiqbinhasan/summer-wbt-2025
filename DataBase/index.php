<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>ADD PRODUCT</h2>
    <form method="POST" action="save_product.php">
        Name: <input type="text" name="name" required><br><br>
        Buying Price: <input type="number" name="buying_price" required><br><br>
        Selling Price: <input type="number" name="selling_price" required><br><br>
        Display: <input type="checkbox" name="display" value="Yes"><br><br>
        <input type="submit" name="save" value="SAVE">
    </form>

    <h2>DISPLAY</h2>
    <table border="1">
        <tr>
            <th>NAME</th>
            <th>PROFIT</th>
            <th>ACTION</th>
        </tr>
        <?php
        include "Confiq.php";
        $sql = "SELECT id, name, selling_price - buying_price AS profit 
                FROM products WHERE display='Yes'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['name']."</td>
                        <td>".$row['profit']."</td>
                        <td>
                            <a href='edit.php?id=".$row['id']."'>edit</a> | 
                            <a href='delete.php?id=".$row['id']."'>delete</a>
                        </td>
                      </tr>";
            }
        }
        ?>
    </table>
</body>
</html>
