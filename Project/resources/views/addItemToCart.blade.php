@if($rowCount === 0) 
    @php
    DB::table('orderdetails')->insert([
        'ProductID' => $id,
        'Price' => $price,
    ]);
    @endphp
    <script>
        alert('Item added successfully!');
        window.location.href = "{{ url('/middleFrame') }}";
    </script>
@else
    <script>
        alert('Item already in cart!');
        window.location.href = "{{ url('/middleFrame') }}";
    </script>
@endif
