<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Search by city!</h1>
    <form action="" method="post">
        @csrf
        <select name="city" id="city">
            @foreach ($cities as $city)
            <option value="{{ $city }}">{{ $city }}</option>
            @endforeach
        </select>
        <input type="submit" value="Search">
    </form>
</body>

</html>