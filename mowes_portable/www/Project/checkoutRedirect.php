<!DOCTYPE html>
<html>
<head>
    <title>Thank you!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
</html>

<?php 
    include 'init.php';
    $username = $_GET['user'];
    $quantities = $_POST['quantity'];

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
        font-family: sans-serif;\">Order Confirmed</h1></div>";

    foreach ($quantities as $productId => $quantity) {
        $sql = "UPDATE OrderDetails
        SET Quantity = $quantity 
        WHERE ProductID = '$productId';";
        mysql_query($sql);
    }
    $findId = "SELECT CustomerID FROM Customers WHERE username = '$username';";
    $resultId = mysql_query($findId);
    $resultId = mysql_fetch_assoc($resultId);
    $userId = $resultId['CustomerID'];

    $currentDate = date('Y-m-d H:i:s');
    $randomNumber = rand(1, 100);

    $query = "INSERT INTO orders VALUES($randomNumber, '$currentDate', $userId, 1)";
    mysql_query($query);

    echo "<h2> Thank you for your purchase! <br><br> We hope you found everything you were looking for!</h2><br>";
    echo "<p style=\"font-family:sans-serif; margin-left:10px;\">After your order with the number: " . $randomNumber . " will be processed we will deliver your products as soon as possible</p>";
    echo "<form method=\"POST\" action=\"http://localhost/Project/main.php?user=$username\">";
    echo "<button type=\"submit\" id=\"buttons\">Back to Main Page</button>";
    echo "</form>";
?>