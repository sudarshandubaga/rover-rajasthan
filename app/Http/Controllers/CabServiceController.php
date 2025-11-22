<?php

namespace App\Http\Controllers;

use App\Http\Traits\UtilTrait;
use App\Models\CabService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CabServiceController extends Controller
{
    use UtilTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = CabService::query();
        $cabServices = $query->latest()->paginate(10);

        return view('admin.screens.cab-service.index', compact('cabServices'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.cab-service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:cab_services,title'
        ]);

        $cabService = new CabService();
        $cabService->title = $request->title;
        $cabService->slug = $this->createSlug($request->title);
        $cabService->note = $request->note;
        $cabService->seo_title = $request->seo_title;
        $cabService->seo_keywords = $request->seo_keywords;
        $cabService->seo_description = $request->seo_description;

        if (!empty($request->banner_image)) {
            $cabService->banner_image = dataUriToImage($request->banner_image, "cabServices");
        }

        $cabService->save();

        return redirect(route('admin.cab-service.index'))->with('success', 'Success! New cab service has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CabService $cabService)
    {
        //
    }

    public function edit(CabService $cabService)
    {
        request()->replace($cabService->toArray());
        request()->flash();

        return view('admin.screens.cab-service.edit', compact('cabService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabService $cabService)
    {
        $request->validate([
            'title' => 'required|unique:cab_services,title,' . $cabService->id
        ]);

        $cabService->title = $request->title;
        $cabService->slug = $this->createSlug($request->title);
        $cabService->note = $request->note;
        $cabService->seo_title = $request->seo_title;
        $cabService->seo_keywords = $request->seo_keywords;
        $cabService->seo_description = $request->seo_description;

        if (!empty($request->banner_image)) {
            if (!empty($cabService->banner_image)) {
                unlink(public_path() . "/storage/" . $cabService->getRawOriginal('banner_image'));
            }
            $cabService->banner_image = dataUriToImage($request->banner_image, "cabServices");
        }

        $cabService->save();

        return redirect(route('admin.cab-service.index'))->with('success', 'Success! New cab service has been updated.');
    }

    public function updateDetails(Request $request, CabService $cabService)
    {
        $index = $request->row_index;

        $cabService->{'title' . $index} = $request->row_title;
        $cabService->{'description' . $index} = $request->row_description;

        if (!empty($request->row_image)) {
            if (!empty($cabService->{'image' . $index})) {
                unlink(public_path() . "/storage/" . $cabService->getRawOriginal('image' . $index));
            }
            $cabService->{'image' . $index} = dataUriToImage($request->row_image, "cabServices");
        }

        $cabService->save();

        return response()->json($cabService);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CabService $cabService)
    {
        if (!empty($cabService->image)) {
            unlink(public_path() . "/storage/" . $cabService->getRawOriginal('image'));
        }
        $cabService->delete();

        return redirect()->back()->with("success", "Success! CabService has been deleted.");
    }
}
