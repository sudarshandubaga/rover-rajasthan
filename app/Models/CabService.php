<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabService extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getBannerImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getImage1Attribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getImage2Attribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getImage3Attribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getImage4Attribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getImage5Attribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getImage6Attribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
