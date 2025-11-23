<?php

namespace App\View\Components;

use App\Models\Cab;
use App\Models\City;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookingForm extends Component
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
        $cities = City::orderBy('name')->pluck('name', 'id');
        $cabs = Cab::get();

        return view('components.booking-form', compact('cities', 'cabs'));
    }
}
