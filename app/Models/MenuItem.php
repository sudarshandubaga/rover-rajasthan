<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $guarded = [];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function menuLocation()
    {
        return $this->belongsTo(MenuLocation::class);
    }
}
