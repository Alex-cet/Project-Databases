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
        @if($rowCount > 0) 
            @php
                $result = $result[0];
                $orderStatus = $result->Name;
                $statusID = $result->StatusID;
            @endphp
            @if ($statusID == 1) 
                    <form method="POST" action={{ route('confirmStatus', ['orderNumber' => $orderNumber]) }}>
                        @csrf
                        <p style="font-family:sans-serif; margin-left:10px;"><b>Order Status:</b> {{ $orderStatus }}</p>
                        <button type="submit" id="buttons">Refresh order status</button></a>
                    </form>
            @else 
                <p style="font-family:sans-serif; margin-left:10px;"><b>Order Status:</b> {{ $orderStatus }}</p>
            @endif
        @else 
            {{ "Order not found." }}
        @endif
    </body>
</html>