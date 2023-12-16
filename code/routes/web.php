<?php

use App\Http\Controllers\CitySearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home page route, contains a button saying: 'load data'
Route::view('/', 'index')->name('home');

// home page route (post): redirects to search page 
Route::post('/', [CitySearchController::class, 'load'])->name('homePost');

// search page route (get): shows different options for doing search
Route::view('/search-options', 'search-options')->name('searchOptions');

// search by city name
Route::get('/search/city', [CitySearchController::class, 'searchByCity'])
                                    ->middleware('cityMiddleware')
                                    ->name('searchByCity');
Route::post('/search/city', [CitySearchController::class, 'searchByCityPost'])->name('searchByCityPost');

// search by lat and long
Route::get('/search/lat-long', [CitySearchController::class, 'searchByLatLong'])->name('searchByLatLong');
Route::post('/search/lat-long', [CitySearchController::class, 'searchByLatLongPost'])->name('searchByLatLongPost');

// Interactive search by using map
Route::get('/search/map', [CitySearchController::class, 'searchByMap'])->name('searchByMap');
Route::post('/search/map', [CitySearchController::class, 'searchByMapPost'])->name('searchByMapPost');
