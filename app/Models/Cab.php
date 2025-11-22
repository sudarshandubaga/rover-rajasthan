<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cab extends Model
{
    protected $guarded = [];

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : 'https://placehold.co/800x450';
    }
}
