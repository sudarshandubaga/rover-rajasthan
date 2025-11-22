<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cab;
use App\Models\CabService;
use Illuminate\Http\Request;

class CabServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CabService $cabService)
    {
        $page = (object) [
            'title' => $cabService->title,
            'image' => $cabService->banner_image,
            'seo_title' => $cabService->seo_title,
            'seo_keywords' => $cabService->seo_keywords,
            'seo_description' => $cabService->seo_description,
        ];
        $cabs = Cab::all();
        return view('web.screens.cab-service.show', compact('cabService', 'page', 'cabs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CabService $cabService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabService $cabService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CabService $cabService)
    {
        //
    }
}
