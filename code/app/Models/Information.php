<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'information';

    // We need to specify fillable fields explicitly
    protected $fillable = [
        '_id',
        'locId',
        'country',
        'region',
        'city',
        'postalCode',
        'latitude',
        'longitude',
        'metroCode',
        'areaCode',
        'cities',
    ];
}
