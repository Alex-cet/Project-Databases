<!DOCTYPE html>
<html>
    <head>
        <title>Checkout</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/showItemsStyle.css">
    </head>
    <body>
        <a href={{ route('mainPage') }}><img style="display: block; margin-left: auto; margin-right: auto;" width="100px" height="100px" src="../Logos/eMarket_logo.png" alt="eMarket Logo"></a><br>

        <div id="separatorHeader">
            <h1>My Cart</h1>
        </div>

        <form method="POST">
            @csrf
            @if ($rowCount === 0) 
                <h4 style="font-size:30px; text-align:center;">No products found in your cart!</h4>
            @else 
                @foreach($cartProducts as $row) 
                    @php
                        $productID = $row->ProductID;
                        $productInfo = DB::table('products')
                        ->where('ProductID', $productID)
                        ->first();
                        $name = $productInfo->Name;
                        $image = $productInfo->image;
                        $price = $productInfo->Price;
                    @endphp

                    <div style="display: flex; align-items: center;">
                        <img width="auto" height="90px" src="data:image/png;base64,{{ base64_encode($image) }}" /></a>
                        <b><p style=font-family:sans-serif;> {{ $name }} </p></b>
                    </div>

                    <div style="display: flex; align-items: center;\">
                        <b><p style=font-family:sans-serif;>Price:</b> {{ $price }} LEI </p><p style="margin-left:10px"><b>Quantity: <b></p>
                        <select name="quantity[{{ $productID }}]">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        </select>
                    </div>

                    <br> <br> <br>

                @endforeach
                <p><input type="submit" id="buttons" value="Proceed to checkout" formaction={{ route('proceedCheckout') }}/>
                    <input type="submit" id="buttons" value="Clear Cart" formaction={{ route('clearCart') }}/></p>
            @endif
        </form>
    </body>
</html>