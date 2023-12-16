<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/city-coord-combined.css') }}" />
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
    @if (!empty($result))
    <p>Following are the cities from our database which are closest to your selected city:</p>
    @foreach($result as $city => $distance)
    <ul>
        <li>City: {{ $city }} ---&gt; Distance: {{ $distance }} Km</li>
    </ul>
    @endforeach
    @endif
</body>

</html>