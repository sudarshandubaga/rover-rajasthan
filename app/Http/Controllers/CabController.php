<?php

namespace App\Http\Controllers;

use App\Models\Cab;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Cab::query();
        $cabs = $query->latest()->paginate(10);

        return view('admin.screens.cab.index', compact('cabs'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.cab.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type'  => 'required|unique:cabs,vehicle_type',
            'capacity'      => 'required|string',
            'fare'          => 'required|numeric',
            'regular_fare' => 'required|numeric|lt:fare'
        ]);

        $cab = new Cab();
        $cab->vehicle_type = $request->vehicle_type;
        $cab->slug = Str::slug($request->vehicle_type, '-');
        $cab->capacity = $request->capacity;
        $cab->regular_fare = $request->regular_fare;
        $cab->fare = $request->fare;
        $cab->description = $request->description;
        $cab->seo_title = $request->seo_title;
        $cab->seo_keywords = $request->seo_keywords;
        $cab->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            $cab->image = dataUriToImage($request->image, "cabs");
        }

        $cab->save();

        return redirect(route('admin.cab.index'))->with('success', 'Success! New cab has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cab $cab)
    {
        $page = $cab;
        return view('web.screens.cab.show', compact('cab', 'page'));
    }

    public function edit(Cab $cab)
    {
        request()->replace($cab->toArray());
        request()->flash();

        return view('admin.screens.cab.edit', compact('cab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cab $cab)
    {
        $request->validate([
            'vehicle_type'  => 'required|unique:cabs,vehicle_type,' . $cab->id,
            'capacity'      => 'required|string',
            'fare'          => 'required|numeric'
        ]);

        $cab->vehicle_type = $request->vehicle_type;
        $cab->slug = Str::slug($request->vehicle_type, '-');
        $cab->capacity = $request->capacity;
        $cab->regular_fare = $request->regular_fare;
        $cab->fare = $request->fare;
        $cab->description = $request->description;
        $cab->seo_title = $request->seo_title;
        $cab->seo_keywords = $request->seo_keywords;
        $cab->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            if (!empty($cab->image)) {
                unlink(public_path() . "/storage/" . $cab->getRawOriginal('image'));
            }
            $cab->image = dataUriToImage($request->image, "cabs");
        }

        $cab->save();

        return redirect(route('admin.cab.index'))->with('success', 'Success! New cab has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cab $cab)
    {
        if (!empty($cab->image)) {
            unlink(public_path() . "/storage/" . $cab->getRawOriginal('image'));
        }
        $cab->delete();

        return redirect()->back()->with("success", "Success! Cab has been deleted.");
    }
}
