<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Search by coordinates</h1>
    <form action="{{ route('searchByLatLongPost') }}" method="post">
        @csrf
        <label for="">Enter Latitude: </label>
        <input type="text" name="lat" id="lat" placeholder="latitude">
        <br>
        <label for="">Enter Longitude: </label>
        <input type="text" name="long" id="long" placeholder="longitude">
        <br>
        <input type="submit" value="Search">
    </form>
    @if (!empty($result))
    <p>Following are the cities from our database which are closest to your entered coordinates:</p>
    @foreach($result as $city => $distance)
    <ul>
        <li>City: {{ $city }} ---&gt; Distance: {{ $distance }}</li>
    </ul>
    @endforeach
    @endif

</body>

</html>