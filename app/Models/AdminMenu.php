<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['routes'];

    public function getRoutesAttribute()
    {
        $children = $this->children();

        $routes = [$this->getRawOriginal('route_name')];

        if ($children->count()) {
            foreach ($this->children as $c) {
                $routes[] = $c->getRawOriginal('route_name');
            }
        }

        return $routes;
    }

    public function getRouteNameAttribute($route_name)
    {
        return !empty($route_name) ? route($route_name, $this->params ?: []) : 'javascript:void(0);';
    }

    public function children()
    {
        return $this->hasMany(AdminMenu::class);
    }

    protected $casts = [
        'params' => 'array'
    ];
}
