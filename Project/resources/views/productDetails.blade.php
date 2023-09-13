<!DOCTYPE html>
<html>
    <head>
        <title>Product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/showItemsStyle.css">
    </head>
    <body>
        @foreach($result as $row)
            @php
                $name = $row->Name;
                $image = $row->image;
                $price = $row->Price;
                $category = $row->Category;
                $description = $row->Description;
            @endphp

            <h2>{{ $name }}</h2>
            <img style="transform: scale(0.5);" src="data:image/png;base64,{{ base64_encode($image) }}" />
            <b><p style=font-family:sans-serif;> Category: </b> {{ $category }} </p>
            <b><p style=font-family:sans-serif;> Description: </p></b>
            <p> {{ $description }} </p>
            <b><p style=font-family:sans-serif;>Price:</b> {{ $price }} LEI <button id="addToCartButton">Add To Cart</button></p>
            <script>
                document.getElementById("addToCartButton").addEventListener("click", function() {
                    window.location.href = "{{ url('/addItemToCart', ['id' => $id, 'price' => $price]) }}";
                });
            </script>
        @endforeach
    </body>
</html>