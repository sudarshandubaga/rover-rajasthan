<?php

namespace App\View\Components;

use App\Models\MenuItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $menuLocation, public $params = [])
    {
        // 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $loc = $this->menuLocation;

        $className = $this->params['class'] ?? '';
        $before = $this->params['beforeIcon'] ?? '';
        $linkClass = $this->params['linkClass'] ?? '';


        $menus = MenuItem::with('page')->whereHas('menuLocation', function ($q) use ($loc) {
            $q->where('name', $loc);
        })->get();

        return view('components.menu', compact('menus', 'className', 'before', 'linkClass'));
    }
}
