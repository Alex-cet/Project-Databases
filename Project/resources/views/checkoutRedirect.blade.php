<!DOCTYPE html>
<html>
    <head>
        <title>Thank you!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/showItemsStyle.css">
    </head>
    <body>
        <a href={{ route('mainPage') }}><img style="display: block; margin-left: auto; margin-right: auto;" width="100px" height="100px" src="../Logos/eMarket_logo.png" alt="eMarket Logo"></a><br>
        
        <div id="separatorHeader">
            <h1>Order Confirmed</h1>
        </div>

        <h2> Thank you for your purchase! <br><br> We hope you found everything you were looking for!</h2><br>
        <p style="font-family:sans-serif; margin-left:10px;">After your order with the number: {{ $randomNumber }} will be processed we will deliver your products as soon as possible</p>
        
        <button type="submit" id="redirectButton">Back to Main Page</button>
        <script>
            document.getElementById("redirectButton").addEventListener("click", function() {
                window.location.href = "{{ route('mainPage') }}";
            });
        </script>
    </body>
</html>