<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Media::latest()->get()->map(function ($media) {
                return [
                    'id'    => $media->id,
                    'title' => $media->title,
                    'url'   => $media->image,
                ];
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1️⃣ Validate request
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 2️⃣ Get uploaded image
        $image = $request->file('image');

        // 3️⃣ Title = original image name (without extension)
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        // 4️⃣ Generate unique image name
        $uniqueName = Str::uuid() . '.' . $image->getClientOriginalExtension();

        // 5️⃣ Store image in public storage
        $path = $image->storeAs('media', $uniqueName, 'public');

        // 6️⃣ Save to database
        $media = Media::create([
            'title' => $originalName,
            'image' => $path,
        ]);

        // 7️⃣ Response
        // return redirect()->back()->with('success', 'Media uploaded successfully.');

        return response()->json([
            'message' => 'Media uploaded successfully.',
            'data' => $media
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        if (!empty($media->getRawOriginal('image'))) {
            $path = public_path() . '/storage/' . $media->getRawOriginal('image');

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $media->delete();

        return response()->json([
            'message' => 'Success! Media image has been deleted.'
        ]);
    }
}
