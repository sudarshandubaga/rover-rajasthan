<?php

namespace App\View\Components;

use App\Models\CabService;
use App\Models\TourPackage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sightseeingPackages = TourPackage::where('type', 'sightseeing')->pluck('name', 'slug');
        $dayPackages = TourPackage::where('type', 'daytour')->pluck('name', 'slug');
        $cabServices = CabService::pluck('title', 'slug');

        return view('components.footer', compact('sightseeingPackages', 'dayPackages', 'cabServices'));
    }
}
