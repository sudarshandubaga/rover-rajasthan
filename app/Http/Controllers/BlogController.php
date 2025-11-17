<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Blog::query();
        $blogs = $query->latest()->paginate(10);

        return view('admin.screens.blog.index', compact('blogs'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title, '-');
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_keywords = $request->seo_keywords;
        $blog->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            $blog->image = dataUriToImage($request->image, "blogs");
        }

        $blog->save();

        $blog->slug .= "-" . base64_encode($blog->id);
        $blog->save();

        return redirect(route('admin.blog.index'))->with('success', 'Success! New blog has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    public function edit(Blog $blog)
    {
        request()->replace($blog->toArray());
        request()->flash();

        return view('admin.screens.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title, '-');
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_keywords = $request->seo_keywords;
        $blog->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            if (!empty($blog->image)) {
                unlink(public_path() . "/storage/" . $blog->getRawOriginal('image'));
            }
            $blog->image = dataUriToImage($request->image, "blogs");
        }

        $blog->save();

        $blog->slug .= "-" . base64_encode($blog->id);
        $blog->save();

        return redirect(route('admin.blog.index'))->with('success', 'Success! New blog has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!empty($blog->image)) {
            unlink(public_path() . "/storage/" . $blog->getRawOriginal('image'));
        }
        $blog->delete();

        return redirect()->back()->with("success", "Success! Blog has been deleted.");
    }
}
