<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = 0;
        $totalProducts = 0;
        return view('admin.screens.dashboard.index', compact('totalCategories', 'totalProducts'));
    }
}
