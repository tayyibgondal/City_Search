/**
 * An event listener is added to listen to tap events on the map.
 * Clicking on the map displays an alert box containing the latitude and longitude
 * of the location pressed.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function setUpClickListener(map) {
    map.addEventListener("tap", function (evt) {
        var coord = map.screenToGeo(
            evt.currentPointer.viewportX,
            evt.currentPointer.viewportY
        );

        // Send an AJAX request to the Laravel route
        $.ajax({
            url: "/search/map/",
            type: "POST",
            data: {
                lat: coord.lat,
                lng: coord.lng,
            },
            success: function (result) {
                // Handle the result (closest cities) and display them
                displayClosestCities(result);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    });
}

/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
    apikey: "80zamIv0rRH_Q4r5Hi5l4KEcxZAogvHfcCrddGcrM1c",
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map
var map = new H.Map(
    document.getElementById("map"),
    defaultLayers.vector.normal.map,
    {
        center: { lat: 30.94625288456589, lng: -54.10861860580418 },
        zoom: 1,
        pixelRatio: window.devicePixelRatio || 1,
    }
);
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener("resize", () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

function displayClosestCities(result) {
    // 'Result' is an object

    distances = Object.values(result);
    city_names = Object.keys(result);

    // Create a container for closest cities
    var closestCitiesContainer = document.getElementById(
        "closest-cities-container"
    );
    closestCitiesContainer.innerHTML = "";

    // Display the closest cities in the container
    var title = document.createElement('p');
    title.textContent = "Following are the 5 cities which are closest to the point on the map, on which you clicked:"
    closestCitiesContainer.appendChild(title);

    for (var i = 0; i < city_names.length; i++) {
        var city = city_names[i];
        var distance = distances[i];

        // Create a new paragraph element for each city
        var cityInfo = document.createElement("p");
        cityInfo.textContent =
            "City: " + city + ", Distance: " + distance + " km";

        // Append the paragraph to the closest cities container
        closestCitiesContainer.appendChild(cityInfo);
    }
}


setUpClickListener(map);
