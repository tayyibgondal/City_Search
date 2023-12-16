<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

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

    public function loadCitiesRecord() {
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
        return view('search-by-lat-long');
    }

    public function searchByMap(Request $request)
    {
        return view('search-by-map');
    }
}
