<!DOCTYPE html>
<html>
<head>
    <title>Track Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="../CSS/showItemsStyle.css">
</head>
<body>

    <a href={{ route('mainPage') }}><img style="display: block; margin-left: auto; margin-right: auto;" width="100px" height="100px" src="../Logos/eMarket_logo.png" alt="eMarket Logo"></a><br>
    
    <div id="separatorHeader">
        <h1>Track Order</h1>
    </div>
    <br><br>

    <form method="POST" action={{ route('searchOrder') }}>
        @csrf
        <label for="searchOrder">Order Number: </label></td>
        <input type="text" id="orderNumber" name="orderNumber" size="30"><br>
        <p><input type="submit" id="buttons" value="Search Order"/></p>
    </form>
    <br>
</body>
</html>

