<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <!-- <link rel="stylesheet" type="text/css" href="demo.css" />
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <link rel="stylesheet" type="text/css" href="../template.css" />
        <script type="text/javascript" src='../test-credentials.js'></script> -->
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>

    <style type="text/css">
        #map {
            width: 95%;
            height: 450px;
            background: grey;
        }

        #panel {
            width: 100%;
            height: 400px;
        }

        .log {
            position: absolute;
            top: 5px;
            left: 5px;
            height: 150px;
            width: 250px;
            overflow: scroll;
            background: white;
            margin: 0;
            padding: 0;
            list-style: none;
            font-size: 12px;
        }

        .log-entry {
            padding: 5px;
            border-bottom: 1px solid #d0d9e9;
        }

        .log-entry:nth-child(odd) {
            background-color: #e1e7f1;
        }
    </style>

    <script>
        window.ENV_VARIABLE = 'developer.here.com'
    </script>
    <!-- <script src='../iframeheight.js'></script> -->
</head>

<body id="markers-on-the-map">
    <div class="page-header">
        <h1>Click on the map!</h1>
    </div>
    <div id="map"></div>
    <script type="text/javascript" src='../js/map.js'></script>
</body>

</html>