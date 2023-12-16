<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Exception;

class CitySearchController extends Controller
{
    public function load()
    {
        // Set maximum execution time of script to 5 minutes
        ini_set('max_execution_time', 300);

        // Path to the CSV file on the server
        $filePath = base_path('csv\GeoLiteCity-Location-UTF-8.csv');

        // Read the CSV file and insert data into the MongoDB collection
        // file($filepath) return array of strings
        // array_map('str_getcsv', file($filepath)) return array of comma separated arrays
        $csvData = array_map('str_getcsv', file($filePath));
        $header = array_shift($csvData);

        foreach ($csvData as $row) {
            $data = array_combine($header, $row);

            // Insert data into the MongoDB collection
            Information::create($data);
        }

        // Adds another row in the database
        $this->loadCitiesRecord();

        return redirect()->route('searchOptions');
    }

    public function loadCitiesRecord()
    {
        $cities = Information::where('city', '!=', '')->pluck('city')->unique();  // array as a string 

        $cities = json_encode($cities);

        Information::create([
            '_id' => 'cities',
            'cities' => $cities,
        ]);
    }

    public function searchByCity(Request $request)
    {
        return view('search-by-city');
    }

    public function searchByLatLong(Request $request)
    {
        // Retrieve the result parameter from the request
        $result = $request->input('result');

        // You can also pass the result to the view if needed
        return view('search-by-lat-long', ['result' => $result]);
    }

    public function searchByLatLongPost(Request $request)
    {
        $lat = (float) $request->input("lat");
        $long = (float) $request->input("long");

        // Extract all records from the database
        $records = Information::offset(350)->take(100)->get();

        // Loop through all records
        //     - for each record, evaluate distance from the user choice
        //     - store that distance as well as city name in an associative array
        //     - sort the associative array based on the distance
        //     - send the records to the redirected route
        $result = array();
        foreach ($records as $record) {
            // jsonify the record
            $record_array = json_decode($record, true);
            try {
                // Extract latitude and longitude
                $record_lat = (float) $record_array['latitude'];
                $record_long = (float) $record_array['longitude'];
                // Calculate distance using Haversine formula
                $distance = $this->haversineDistance($lat, $long, $record_lat, $record_long);
                // echo "$distance <br>";
                // echo "latitude {$record_array['latitude']} and longitude: {$record_array['longitude']} <br>";
                // Set country
                $city = $record_array['city'];
                if($city == '') {
                    $city = "Anonymous City " . round($distance);
                }
                // echo "$city <br><br><br>";
                // Store in result array
                $result[$city] = $distance;
            } catch (Exception $e) {
            }
        }

        // Sort the result array based on distances
        asort($result);
        // slice the array
        $result = array_slice($result, 0, 5, true);

        // Redirect to the desired route with the sorted result
        return redirect()->route('searchByLatLong', ['result' => $result]);
    }

    // Haversine formula to calculate great-circle distance
    private function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Radius of the Earth in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // Distance in kilometers

        return $distance;
    }

    public function searchByMap(Request $request)
    {
        return view('search-by-map');
    }
}
