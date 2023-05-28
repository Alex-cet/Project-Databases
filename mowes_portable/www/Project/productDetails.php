<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
</html>


<?php
    include 'init.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE ProductID=$id";
    $result = mysql_query($sql);
    while($row=mysql_fetch_assoc($result)) {
        $name = $row['Name'];
        $image = $row['image'];
        $price = $row['Price'];
        $category = $row['Category'];
        $description = $row['Description'];
        echo "<h2 style=font-family:sans-serif>$name</h2>";
        echo "<img style=\"transform: scale(0.7);\" src='data:image/png;base64," . base64_encode($image) . "' />";
        echo "<b><p style=font-family:sans-serif;> Category: </b> $category </p>";
        echo "<b><p style=font-family:sans-serif;> Description: </p></b>";
        echo "<p> $description </p>";
        echo "<form method=\"POST\" action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
        echo "<input type='hidden' name='productId' value='$id'>";
        echo "<input type='hidden' name='productPrice' value='$price'>";
        echo "<b><p style=font-family:sans-serif;>Price:</b> $price LEI <button id=\"buttons\">Add To Cart</button></p>";
        echo "</form>";
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'init.php';
        $productId = $_POST['productId'];
        $productPrice = $_POST['productPrice'];
        $veryifyQuery = "SELECT * FROM OrderDetails WHERE ProductID = $productId";
        $result = mysql_query($veryifyQuery);
        if (mysql_num_rows($result) == 0) {
            $q = "INSERT INTO OrderDetails(ProductID, Price) VALUES($productId, $productPrice)";
            mysql_query($q);
            echo "<script>";
            echo "alert('Item added successfully!');";
            echo "window.location.href = 'middleFrame.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Item already in cart!');";
            echo "window.location.href = 'middleFrame.php';";
            echo "</script>";
        }
    }

?>

<?php   
    include 'init.php';
    $q = "SELECT * FROM cart";
    $result = mysql_query($q);
    $counter = mysql_num_rows($result);
    echo "
    <div class=\"header\">
    <div class=\"cart\"><i class=\"fa-solid fa-cart-shopping\"></i><p id=\"count\">$counter</div>
    </div>";
?>


