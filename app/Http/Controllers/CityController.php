<?php

namespace App\Http\Controllers;

use App\Http\Traits\UtilTrait;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    use UtilTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::latest()->get();
        return view('admin.screens.city.index', compact('cities'));
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
        $request->validate([
            'name' => 'required|unique:cities,name',
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->slug = $this->createSlug($request->name);
        $city->save();

        return redirect()->back()->with('success', 'Success! City has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        request()->replace($city->toArray());
        request()->flash();

        return view('admin.screens.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,' . $city->id,
        ]);

        $city->name = $request->name;
        $city->slug = $this->createSlug($request->name);
        $city->save();

        return redirect(route('admin.city.index'))->with('success', 'Success! City has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        if ($city->image) {
            unlink(public_path() . "/storage/" . $city->getRawOriginal('image'));
        }
        $city->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
