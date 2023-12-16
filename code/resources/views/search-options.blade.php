<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('searchByCity') }}" method="get">
        <input type="submit" value="Search by name">
    </form>

    <form action="{{ route('searchByLatLong') }}" method="get">
        <input type="submit" value="Search by Latitude/Longitude">
    </form>

    <form action="{{ route('searchByMap') }}" method="get">
        <input type="submit" value="Interactive search on google maps">
    </form>
</body>

</html>