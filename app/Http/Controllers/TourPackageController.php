<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tourPackages = TourPackage::latest()->paginate(10);
        return view('admin.screens.tour-package.index', compact('tourPackages'));
    }

    public function create()
    {
        request()->flush();
        return view('admin.screens.tour-package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255|unique:tour_packages,name',
            'type'            => 'required|string',
            'description'     => 'nullable|string',
            'long_description' => 'nullable|string',
            'price'           => 'nullable|string',
            'duration'        => 'nullable|string',
            'gallery'         => 'array',
            'inclusions'      => 'array',
            'exclusions'      => 'array',
            'itinerary'       => 'array',
        ]);

        $tourPackage = new TourPackage();

        $tourPackage->name = $request->name;
        $tourPackage->slug = Str::slug($request->name);
        $tourPackage->type = $request->type;
        $tourPackage->description = $request->description;
        $tourPackage->long_description = $request->long_description;
        $tourPackage->price = $request->price;
        $tourPackage->duration = $request->duration;

        // Arrays – Gallery, Inclusions, Exclusions, Itinerary
        $tourPackage->gallery = $request->gallery ?? [];
        $tourPackage->inclusions = $request->inclusions ?? [];
        $tourPackage->exclusions = $request->exclusions ?? [];
        $tourPackage->itinerary = $request->itinerary ?? [];

        // SEO Fields
        $tourPackage->seo_title       = $request->seo_title;
        $tourPackage->seo_keywords    = $request->seo_keywords;
        $tourPackage->seo_description = $request->seo_description;

        // Main Image
        if (!empty($request->image)) {
            $tourPackage->image_url = dataUriToImage($request->image, "tourPackages");
        }

        $tourPackage->save();

        // Unique slug by appending encoded ID
        $tourPackage->slug .= "-" . base64_encode($tourPackage->id);
        $tourPackage->save();

        return redirect()
            ->route('admin.tour-package.index')
            ->with('success', 'Success! A new tour package has been added.');
    }


    /**
     * Show edit form.
     */
    public function edit(TourPackage $tourPackage)
    {
        request()->replace($tourPackage->toArray());
        request()->flash();

        return view('admin.screens.tour-package.edit', compact('tourPackage'));
    }


    /**
     * Update the specified resource.
     */
    public function update(Request $request, TourPackage $tourPackage)
    {
        $request->validate([
            'name'            => 'required|string|max:255|unique:tour_packages,name,' . $tourPackage->id,
            'type'            => 'required|string',
            'description'     => 'nullable|string',
            'long_description' => 'nullable|string',
            'price'           => 'nullable|string',
            'duration'        => 'nullable|string',
            'gallery'         => 'array',
            'inclusions'      => 'array',
            'exclusions'      => 'array',
            'itinerary'       => 'array',
        ]);

        $tourPackage->name = $request->name;
        $tourPackage->slug = Str::slug($request->name);
        $tourPackage->type = $request->type;
        $tourPackage->description = $request->description;
        $tourPackage->long_description = $request->long_description;
        $tourPackage->price = $request->price;
        $tourPackage->duration = $request->duration;

        // Arrays
        $tourPackage->gallery = $request->gallery ?? [];
        $tourPackage->inclusions = $request->inclusions ?? [];
        $tourPackage->exclusions = $request->exclusions ?? [];
        $tourPackage->itinerary = $request->itinerary ?? [];

        // SEO
        $tourPackage->seo_title = $request->seo_title;
        $tourPackage->seo_keywords = $request->seo_keywords;
        $tourPackage->seo_description = $request->seo_description;

        // Update Image
        if (!empty($request->image)) {

            if (!empty($tourPackage->image_url)) {
                @unlink(public_path("storage/" . $tourPackage->getRawOriginal('image_url')));
            }

            $tourPackage->image_url = dataUriToImage($request->image, "tourPackages");
        }

        $tourPackage->save();

        return redirect()
            ->route('admin.tour-package.index')
            ->with('success', 'Success! Tour package has been updated.');
    }


    /**
     * Remove the specified resource.
     */
    public function destroy(TourPackage $tourPackage)
    {
        if (!empty($tourPackage->image_url)) {
            @unlink(public_path("storage/" . $tourPackage->getRawOriginal('image_url')));
        }

        $tourPackage->delete();

        return redirect()->back()->with("success", "Success! Tour package has been deleted.");
    }
}
