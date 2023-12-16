<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>Search on Map</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
</head>

<body id="markers-on-the-map">
    <div class="page-header">
        <h1>Click on the map to find the closest cities</h1>
    </div>
    <div id="closest-cities-container"></div>
    <div id="map"></div>

    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
</body>

</html>