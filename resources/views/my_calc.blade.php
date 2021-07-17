<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Enter Numbers</h2>
    <hr>
    <form action="/show" method="POST">
        {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"/> --}}
        @csrf
        <input type="number" name="n1">
        <input type="number" name="n2">
        <input type="submit" value="sum">
    </form>
    <hr>
    {{ $sum_result ??" no yet"}}
</body>
</html>