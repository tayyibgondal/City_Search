<?php

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/ping', function (Request  $request) {
//     $connection = DB::connection('mongodb');
//     $msg = 'MongoDB is accessible!';
//     try {
//         $connection->command(['ping' => 1]);
//     } catch (\Exception  $e) {
//         $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
//     }
//     return ['msg' => $msg];
// });

// Route::get('/add', function (Request $request) {
//     try {
//         Information::create([
//             'cities' => 'Pakistan',
//         ]);
//     } catch (\Exception $e) {
//         return ['msg' => 'Error: ' . $e->getMessage()];
//     }
//     return ['msg' => 'Information added successfully!'];
// });

// Route::get('/get', function (Request $request) {
//     $citiesDocument = Information::where('_id', 'cities')->first();  // result is a string
//     $cities = json_encode($citiesDocument->cities);
//     $cities = json_decode($citiesDocument->cities);
//     foreach ($cities as $city) {
//         echo "$city<br>";
//     }
// });

// Route::get('/add', function (Request $request) {
//     $cities = Information::where('city', '!=', '')->pluck('city')->unique();  // array as a string 

//     $cities = json_encode($cities);

//     Information::create([
//         '_id' => 'cities',
//         'cities' => $cities,
//     ]);

//     echo 'added';
// });
