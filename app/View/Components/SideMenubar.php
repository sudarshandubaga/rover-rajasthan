<?php

namespace App\View\Components;

use App\Models\AdminMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideMenubar extends Component
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
        $adminMenus = AdminMenu::with('children')->whereNull('admin_menu_id')->oldest()->get();
        // dd($adminMenus->toArray());
        return view('components.side-menubar', compact('adminMenus'));
    }
}
