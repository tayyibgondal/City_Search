<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Search by coordinates</h1>    
    <form action="" method="post">
        @csrf
        <label for="">Enter Latitude: </label>
        <input type="text" name="lat" id="lat" placeholder="latitude">
        <br>
        <label for="">Enter Longitude: </label>
        <input type="text" name="long" id="long" placeholder="longitude">
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>