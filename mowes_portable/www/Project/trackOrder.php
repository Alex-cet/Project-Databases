<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="showItemsStyle.css">
</head>
<body>
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
            align-items: center;\">
            <h1 style=\"color: white;
            -webkit-text-stroke: 1px black;
            font-size: 30px;
            text-align: center;
            font-weight: 700;
            font-family: sans-serif;\">Track Order</h1>
        </div> <br><br>
        <form method=\"POST\" action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?user=$username'>
            <label for=\"searchOrder\">Order Number: </label></td>
            <input type=\"text\" id=\"orderNumber\" name=\"orderNumber\" size=\"30\"><br>
            <p><input type=\"submit\" id=\"buttons\" value=\"Search Order\"/></p>
        </form>";
    ?>
    <br>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include 'init.php';
        $orderNumber = $_POST['orderNumber'];
        $username = $_GET['user'];
        $query = "SELECT * FROM order_status JOIN orders ON order_status.StatusID = orders.StatusID WHERE orders.Number = $orderNumber;";
        $result = mysql_query($query);
        if (mysql_num_rows($result) > 0) {
            $result = mysql_fetch_assoc($result);
            $orderStatus = $result['Name'];
            $statusID = $result['StatusID'];
            if ($statusID == 1) {
                echo "<form method=\"POST\" action=\"http://localhost/Project/confirmOrderStatus.php?orderNumber=$orderNumber&user=$username\">";
                echo "<p style=\"font-family:sans-serif; margin-left:10px;\"><b>Order Status:</b> $orderStatus</p>";
                echo "<button type=\"submit\" id=\"buttons\">Refresh order status</button></a>";
                echo "</form>";
            }  else {
                echo "<p style=\"font-family:sans-serif; margin-left:10px;\"><b>Order Status:</b> $orderStatus</p>";
            }
        } else {
            echo "Order not found.";
        }
    }
?>

