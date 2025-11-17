<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
