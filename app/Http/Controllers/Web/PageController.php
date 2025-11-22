<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Page;
use App\Models\StudioCategory;
use App\Models\Syndication;
use App\Models\Team;
use App\Models\Vfx;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $pageName = $page->template ?? 'page';

        switch ($pageName) {
            case 'blog':
                return $this->blog($page);

            case 'cab-services':
                return $this->cabServices($page);

            case 'about':
                return $this->about($page);

            case 'contact':
                return $this->contact($page);

            case 'faq':
                return $this->faq($page);

            case 'career':
                return $this->career($page);

            case 'customized_tour':
                return $this->customized_tour($page);

            default:
                return $this->defaultPage($page);
        }
    }

    private function blog($page)
    {
        $blogs = Blog::latest()->paginate(15);
        return view('web.screens.news', compact('page', 'blogs'));
    }

    private function about($page)
    {
        return view('web.screens.about', compact('page'));
    }

    private function customized_tour($page)
    {
        return view('web.screens.customize-tour', compact('page'));
    }

    private function contact($page)
    {
        return view('web.screens.contact', compact('page'));
    }

    private function faq($page)
    {
        $faqs = Faq::latest()->get();
        return view('web.screens.faq', compact('page', 'faqs'));
    }

    private function cabServices($page)
    {
        // Complete sample data for cab services
        $cabs = [
            [
                'name' => 'Sedan',
                'type' => 'Economy',
                'capacity' => 4,
                'rate' => '25',
                'imageUrl' => 'https://picsum.photos/seed/sedan/400/300'
            ],
            [
                'name' => 'SUV',
                'type' => 'Premium',
                'capacity' => 6,
                'rate' => '45',
                'imageUrl' => 'https://picsum.photos/seed/suv/400/300'
            ],
            [
                'name' => 'Hatchback',
                'type' => 'Economy',
                'capacity' => 4,
                'rate' => '20',
                'imageUrl' => 'https://picsum.photos/seed/hatchback/400/300'
            ],
            [
                'name' => 'Luxury Sedan',
                'type' => 'Luxury',
                'capacity' => 4,
                'rate' => '60',
                'imageUrl' => 'https://picsum.photos/seed/luxsedan/400/300'
            ],
            [
                'name' => 'Tempo Traveller',
                'type' => 'Premium',
                'capacity' => 7,
                'rate' => '50',
                'imageUrl' => 'https://picsum.photos/seed/minivan/400/300'
            ],
            [
                'name' => 'Pickup Truck',
                'type' => 'Utility',
                'capacity' => 4,
                'rate' => '40',
                'imageUrl' => 'https://picsum.photos/seed/pickup/400/300'
            ],
        ];
        return view('web.screens.cab-services', compact('page', 'cabs'));
    }

    private function career($page)
    {
        $careerPosts = []; // Faq::latest()->get();
        return view('web.screens.career', compact('page', 'careerPosts'));
    }

    private function defaultPage($page)
    {
        return view('web.screens.page', compact('page'));
    }
}
