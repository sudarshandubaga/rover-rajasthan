<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'type',
        'description',
        'image_url',
        'price',
        'duration',
        'long_description',
        'gallery',
        'inclusions',
        'exclusions',
        'itinerary'
    ];

    protected $casts = [
        'gallery' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'itinerary' => 'array',
    ];


    public function getImageUrlAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
