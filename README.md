# City Search Application

City Search Application is a web application built with Laravel and MongoDB that allows users to search for cities and find the closest cities based on various criteria.

## Features

- **Load Data:** Click on "Load Data" to load city data into the MongoDB database.

- **Search by City:** Search for cities by selecting a city from the dropdown list.

- **Search by Coordinates:** Enter latitude and longitude to find cities closest to the specified coordinates.

- **Interactive Map Search:** Click on the map to find the closest cities based on the selected location.

## Main Concepts Used from Programming Languages

- **PHP (Laravel):**

  - MVC Architecture
  - Eloquent ORM for Database Interactions
  - Blade Templating Engine
  - Artisan Commands for Laravel

- **JavaScript:**
  - AJAX for Asynchronous Requests
  - Event Listeners for Map Interactivity

## Haversine Formula

The application utilizes the Haversine formula to calculate the great-circle distance between two geographical coordinates (latitude and longitude). This formula is employed to determine the distance between cities and provide accurate search results based on proximity.

### Formula

The Haversine formula is expressed as follows:

```plaintext
a = sin²(Δlat/2) + cos(lat1) * cos(lat2) * sin²(Δlong/2)
c = 2 * atan2(sqrt(a), sqrt(1-a))
distance = R * c

Where:
lat1, long1, lat2, long2 are the coordinates of two points.
Δlat and Δlong are the differences between latitude and longitude.
R is the Earth's radius.
```

## Using AJAX for Interactive Map Search

The interactive map search feature is implemented using AJAX (Asynchronous JavaScript and XML) to enhance user experience. When a user clicks on the map, an AJAX request is sent to the server, which then calculates the closest cities based on the clicked location. This approach ensures a seamless and dynamic map interaction without requiring a full page reload.

## Technologies Used

- Laravel: [https://laravel.com/](https://laravel.com/)
- MongoDB: [https://www.mongodb.com/](https://www.mongodb.com/)
- HERE Maps API: [https://developer.here.com/](https://developer.here.com/)

## MongoDB Setup for project

To integrate MongoDB with the City Search Application, I followed the steps below:

1. **Install PHP Driver:**

   - Download the PHP driver for MongoDB from the [GitHub repository](https://github.com/mongodb/mongo-php-driver/releases).
   - Ensure that you choose a version compatible with your PHP version, thread safety, and architecture.

2. **Install Laravel MongoDB Package:**

   - Run the following command in the Laravel project directory:
     ```bash
     composer require mongodb/laravel-mongodb:4.0.0
     ```

3. **Update .env File:**

   - Open project's `.env` file and add the following line to specify the MongoDB connection URI:
     ```env
     MONGODB_URI=mongodb://localhost:27017/
     ```

4. **Update Config/database.php:**
   - Open the `config/database.php` file in the Laravel project.
   - Add or modify the MongoDB configuration under the `connections` array:
     ```php
     'mongodb' => [
         'driver' => 'mongodb',
         'dsn' => env('MONGODB_URI'),
         'database' => 'citiesDB',
     ],
     ```

Now, the Laravel application is configured to use MongoDB as the database for the City Search functionality.

## User Interface

The user interface provides a simple and intuitive experience. Users can easily load data, perform city searches, and interact with the map to find the closest cities. Here are the screenshots:

### Main page

![Home](images/1.%20home.png)

### Search options page

![Home](images/2.%20search-options.png)

### Search by city page

![Home](images/3.%20search-by-city.png)

### Search by co-ordinates page

![Home](images/4.%20search-by-coordinates.png)

### Interactive search using realtime map page

![Home](images/5.%20search-by-clicking-on-map.png)
