<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/mainPageStyle.css">
    </head>
    <body>
        <form method="POST" action={{ url('/searchResult') }} target="middleFrame">
        @csrf
        <div id="container">
            <a href={{ route('mainPage') }}><img class="img1" src="../Logos/eMarket_logo.png" alt="eMarket Logo"></a>
            <input type="text" name="searchBar" id="searchBar" placeholder="Search for a product.."/>
            <button type="submit" class="searchButton"></button>
            <a href={{ route('accountDetails') }}><img src="../Logos/user.png" alt="User Icon" width="28px" height="28px" style="margin-left:40px; vertical-align: middle;"><label href={{ route('accountDetails') }} style="cursor:pointer; margin-left:5px; vertical-align: middle;">My Account</label></a>
            <a href={{ route('checkout') }}><img src="../Logos/cart.png" alt="User Icon" width="32px" height="32px" style="margin-left:10px; vertical-align: middle;"><label href={{ route('checkout') }} style="cursor:pointer; margin-left:5px; vertical-align: middle;">My Cart</label></a>
            <a href={{ route('trackOrder') }}><img src="../Logos/trackOrder.png" alt="User Icon" width="32px" height="32px" style="margin-left:10px; vertical-align: middle;"><label href={{ route('trackOrder') }} style="cursor:pointer; margin-left:5px; vertical-align: middle;">Track Order</label></a>
            <a href={{ route('signOut') }}><img src="../Logos/signOut.png" alt="User Icon" width="32px" height="32px" style="margin-left:20px; vertical-align: middle;"><label href={{ route('signOut') }} style="cursor:pointer; margin-left:5px; vertical-align: middle;">Sign Out</label></a>
        </div>
        <div id="separator">
            <h1>Welcome to eMarket! Your search continues here</h1>
        </div>
        </form>
        <iframe id ="leftFrame" src={{ url('/leftFrame') }}></iframe>
        <iframe id ="middleFrame" name="middleFrame" src={{ url('/middleFrame') }}></iframe>
    </body>
</html>

