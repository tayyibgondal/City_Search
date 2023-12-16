<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>City Search Application</title>
</head>

<body>
    <h1>City Search</h1>
    <p>To proceed, first click on 'load' to load the data in the database. Then you can make searches :)</p>
    <form action="{{ route('homePost') }}" method="post">
        @csrf
        <input type="submit" value="Load Data">
    </form>
</body>

</html>