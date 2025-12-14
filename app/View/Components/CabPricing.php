<?php

namespace App\View\Components;

use App\Models\Cab;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CabPricing extends Component
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
        $cabs = Cab::get();
        return view('components.cab-pricing', compact('cabs'));
    }
}
