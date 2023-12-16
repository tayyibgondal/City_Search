<?php

namespace App\Http\Middleware;

use App\Models\Information;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Fetch unique cities from the database
        $citiesDocument = Information::where('_id', 'cities')->first();  // result is a string
        $cities = json_decode($citiesDocument->cities, true); // this is an array
        // the true argument in above line returns an associative array

        // get only first 40 entries of array
        $cities = array_slice($cities, 0, 40);

        // Pass the cities to the view
        view()->share('cities', $cities);

        return $next($request);
    }
}
