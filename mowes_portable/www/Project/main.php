<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="mainPageStyle.css">
    </head>
<body>
    <form method="post" action="http://localhost/Project/searchResult.php" target="middleFrame">
    <div id="container">
        <?php 
            include 'init.php';
            $username = $_GET['user'];
            echo "<a href=\"http://localhost/Project/main.php?user=$username\"><img class=\"img1\" src=\"eMarket_logo.png\" alt=\"eMarket Logo\"></a>";
        ?>
        <input type="text" name="searchBar" id="searchBar" placeholder="Search for a product.."/>
        <button type="submit" class="searchButton"></button>
        <?php
            include 'init.php';
            $username = $_GET['user'];
            echo "<a href=\"http://localhost/Project/userAccount.php?user=$username\"><img src=\"user.png\" alt=\"User Icon\" width=\"28px\" height=\"28px\" style=\"margin-left:10px;margin-top:7px;\"> My Account</a>";
            echo "<a href=\"http://localhost/Project/checkout.php?user=$username\"><img src=\"cart.png\" alt=\"User Icon\" width=\"32px\" height=\"32px\" style=\"margin-left:10px; margin-top:7px;\">My Cart</a>";
            echo "<a href=\"http://localhost/Project/trackOrder.php?user=$username\"><img src=\"trackOrder.png\" alt=\"User Icon\" width=\"32px\" height=\"32px\" style=\"margin-left:10px; margin-top:7px;\">Track Order</a>";
        ?>
    </div>
    <div id="separator">
        <h1>Welcome to eMarket! Your search continues here</h1>
    </div>
    </form>
    <iframe id ="leftFrame" src="http://localhost/Project/leftFrame.php"></iframe>
    <iframe id ="middleFrame" name="middleFrame" src="http://localhost/Project/middleFrame.php"></iframe>
</body>
</html>

