<!DOCTYPE html>
<html>
<head>
    <title>Popular Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
<body>
    <h2>Most Popular Products</h2>
    <br> <br> <br>
</body>
</html>

<?php
    include 'init.php';
    $q = "SELECT * FROM products WHERE ProductID = 2 OR ProductID = 6 OR ProductID = 12";
    $result = mysql_query($q);
    while ($row = mysql_fetch_assoc($result)) {
        $id = $row['ProductID'];
        $name = $row['Name'];
        $image = $row['image'];
        $price = $row['Price'];
        echo "<div class=\"product_$id\">"; 
        echo "<h3>$name</h3>";
        echo "<img style=\"transform: scale(0.7);\" src='data:image/png;base64," . base64_encode($image) . "' />";
        echo "<b><p style=font-family:sans-serif;>Price: $price LEI <a href=\"http://localhost/Project/productDetails.php?id=$id\"><button id=\"buttons\">Details>></button></a></p><b>";
        echo "<div id=\"separator\"></div>";
        echo "</div>";
    }
?>