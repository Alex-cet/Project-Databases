<!DOCTYPE html>
<html>
<head>
    <title>Products From Specific Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
</html>

<?php
    include 'init.php';

    $category = urldecode($_GET['category']);

    $sql = "SELECT ProductID, Name, image, Price FROM products WHERE Category = '$category'";
    $result = mysql_query($sql);
    while($row=mysql_fetch_assoc($result)) {
        $name = $row['Name'];
        $image = $row['image'];
        $price = $row['Price'];
        $id = $row['ProductID'];
        echo "<h2 style=font-family:sans-serif>$name</h2>";
        echo "<img style=\"transform: scale(0.7);\" src='data:image/png;base64," . base64_encode($image) . "' />";
        echo "<b><p style=font-family:sans-serif;>Price:</b> $price LEI <a href=\"http://localhost/Project/productDetails.php?id=$id\"><button id=\"buttons\">Details>></button></a></p>";
        echo "<div id=\"separator\"></div>";
        echo "<br>";
    }
?>