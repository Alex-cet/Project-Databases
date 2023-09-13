<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
</head>
<body>
    <h1>Data from Database</h1>
    <ul>
        @foreach($data as $item)
            <li>{{ $item->Name }}</li>
        @endforeach
    </ul>
</body>
</html>
