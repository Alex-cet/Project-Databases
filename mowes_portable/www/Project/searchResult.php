<!DOCTYPE html>
<html>
<head>
    <title>All Products Searched</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
</html>

<?php
    include 'init.php';
    $searchName = $_POST['searchBar'];
    $sql = "SELECT * FROM products WHERE Name LIKE '%$searchName%';";
    $result = mysql_query($sql);
    while($row=mysql_fetch_assoc($result)) {
        $id = $row['ProductID'];
        $name = $row['Name'];
        $image = $row['image'];
        $price = $row['Price'];
        echo "<h2 style=font-family:sans-serif>$name</h2>";
        echo "<img style=\"transform: scale(0.7);\" src='data:image/png;base64," . base64_encode($image) . "' />";
        echo "<b><p style=font-family:sans-serif;>Price: $price LEI <a href=\"http://localhost/Project/productDetails.php?id=$id\"><button id=\"buttons\">Details>></button></a></p><b>";
        echo "<br>";
        echo "<br>";
        echo "<div id=\"separator\"></div>";
        echo "<br>";
    }
?>