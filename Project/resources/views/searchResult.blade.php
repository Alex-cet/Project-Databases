<!DOCTYPE html>
<html>
    <head>
        <title>All Products Searched</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/showItemsStyle.css">
    </head>
    <body>
        @foreach($result as $row)
            @php
                $id = $row->ProductID;
                $name = $row->Name;
                $image = $row->image;
                $price = $row->Price;
            @endphp
            
            <h2>{{ $name }}</h2>
            <a href={{ url('/productDetails', ['id' => $id]) }}><img style="transform: scale(0.5);" src="data:image/png;base64,{{ base64_encode($image) }}" /></a>
            <b><p style=font-family:sans-serif;>Price:</b> {{ $price }} LEI <a href={{ url('/productDetails', ['id' => $id]) }}><button id="buttons">Details>></button></a></p>
            <div id="separator"></div>
            <br>
        @endforeach
    </body>
</html>