<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['name', 'mobile', 'email', 'message', 'rating', 'is_active'];
}
