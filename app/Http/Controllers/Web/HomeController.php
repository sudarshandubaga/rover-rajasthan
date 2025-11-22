<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cab;
use App\Models\City;
use App\Models\Page;
use App\Models\Slider;
use App\Models\WorkVideo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')->firstOrFail();
        $about = Page::where('slug', 'about-us')->firstOrFail();

        $sliders = Slider::latest()->get();
        $blogs = Blog::latest()->paginate(10);
        $cities = City::orderBy('name')->pluck('name', 'id');
        $cabs = Cab::get();

        return view('web.screens.home', compact('blogs', 'page', 'about', 'sliders', 'cities', 'cabs'));
    }
}
