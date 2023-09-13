<!DOCTYPE html>
<html>
    <body>
        <h2 style="text-align:center; font-family:sans-serif;">Categories</h2>
        <br>
        
        @foreach($categories as $category)
            @php
                $name = $category->Name;
                $encodedCategory = urlencode($name);
            @endphp

            <a href={{ url('/showItemsCategory', ['category' => $encodedCategory]) }} target="middleFrame">
            <button style="font-family:sans-serif; background-color: white; padding: 20px; width: 100%; border-left: none; 
            border-right: none; border-top:2px solid whitesmoke; border-bottom:2px solid whitesmoke; font-size: 15px; 
            cursor:pointer; text-align: left">
                {{ $name }}
            </button>
            </a>
        @endforeach
    </body>
</html>