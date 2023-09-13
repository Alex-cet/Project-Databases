<!DOCTYPE html>
<html>
    <head>
        <title>Popular Products</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../CSS/showItemsStyle.css">
    </head>
    <body>
        <h2>Most Popular Products</h2>
        <br> <br> <br>

        @foreach($result as $row)
            @php
                $id = $row->ProductID;
                $name = $row->Name;
                $image = $row->image;
                $price = $row->Price;
            @endphp

            <div class="product_{{ $id }}">
                <h3>{{ $name }}</h3>
                <a href={{ url('/productDetails', ['id' => $id]) }}><img style="transform: scale(0.5);" src="data:image/png;base64,{{ base64_encode($image) }}" /></a>
                <b><p style="font-family:sans-serif;">Price: {{ $price }} LEI <a href={{ url('/productDetails', ['id' => $id]) }}><button id="buttons">Details>></button></a></p><b>
                <div id="separator"></div>
            </div>
        @endforeach
    </body>
</html>
