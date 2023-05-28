<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
</html>

<?php
    include 'init.php';
    $q = "SELECT * FROM OrderDetails";
    $result = mysql_query($q);
    $username = trim($_GET['user']);

    echo "<a href=\"http://localhost/Project/main.php?user=$username\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" width=\"100px\" height=\"100px\" src=\"eMarket_logo.png\" alt=\"eMarket Logo\"></a><br>";
    echo "<div id=\"separator\" style=\"width: auto;
        height: 50px;
        background-color: #36096d;
        background-image: linear-gradient(315deg, #36096d 0%, #2bc4f3 74%);
        display: flex;
        justify-content: center;
        align-items: center;\"><h1 style=\"color: white;
        -webkit-text-stroke: 1px black;
        font-size: 30px;
        text-align: center;
        font-weight: 700;
        font-family: sans-serif;\">My Cart</h1></div>";

    echo "<form method=\"POST\">";

    $products = "SELECT * FROM orderdetails";
    $resultProducts = mysql_query($products);
    if (mysql_num_rows($resultProducts) == 0) {
        echo "<h4 style=\"font-size:30px; text-align:center;\">No products found in your cart!</h4>";
    } else {
        while($row = mysql_fetch_assoc($result)) {
            $productID = $row['ProductID'];
            $q2 = "SELECT * FROM Products WHERE ProductID = $productID";
            $result2 = mysql_query($q2);
            $row2 = mysql_fetch_assoc($result2);
            $name = $row2['Name'];
            $image = $row2['image'];
            $price = $row2['Price'];
    
            echo "<div style=\"display: flex;
            align-items: center;\">";
            echo "<img width=\"auto\" height=\"90px\" src='data:image/png;base64," . base64_encode($image) . "' />
            <b><p style=font-family:sans-serif;> $name </p></b>";
            echo "</div>";
            echo "<div style=\"display: flex;
            align-items: center;\">";
            echo "<b><p style=font-family:sans-serif;>Price:</b> $price LEI </p><p style=\"margin-left:10px\"><b>Quantity: <b></p>
            <select name=\"quantity[$productID]\">
              <option value=\"1\">1</option>
              <option value=\"2\">2</option>
              <option value=\"3\">3</option>
              <option value=\"4\">4</option>
              <option value=\"5\">5</option>
              <option value=\"6\">6</option>
              <option value=\"7\">7</option>
              <option value=\"8\">8</option>
              <option value=\"9\">9</option>
              <option value=\"10\">10</option>
            </select>";
            echo "</div>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }
        echo "<p><input type=\"submit\" id=\"buttons\" value=\"Proceed to checkout\" formaction=\"http://localhost/Project/checkoutRedirect.php?user=$username\"/>";
        echo "    <input type=\"submit\" id=\"buttons\" value=\"Clear Cart\" formaction=\"http://localhost/Project/clearCart.php?user=$username\"/></p>";
        echo "</form>";
    }    
?>