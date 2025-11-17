<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.screens.slider.index', compact('sliders'));
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
            'title' => 'required',
            'image' => 'required'
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        if (!empty($request->image)) {
            $slider->image = dataUriToImage($request->image, "sliders");
        }
        $slider->save();

        return redirect()->back()->with('success', 'Success! Slider image added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        request()->replace($slider->toArray());
        request()->flash();

        return view('admin.screens.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slider->title = $request->title;
        if (!empty($request->image)) {
            if ($slider->image) {
                unlink(public_path() . "/storage/" . $slider->getRawOriginal('image'));
            }
            $slider->image = dataUriToImage($request->image, "sliders");
        }
        $slider->save();

        return redirect(route('admin.slider.index'))->with('success', 'Success! Slider image added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            unlink(public_path() . "/storage/" . $slider->getRawOriginal('image'));
        }
        $slider->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
