<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\WelcomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function create()
    {
        $site = $this->site;

        request()->replace($site->toArray());
        request()->flash();

        return view('admin.screens.site.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $site = $this->site;
        $site->title = $request->title;
        $site->tagline = $request->tagline;
        $site->email = $request->email;
        $site->phone = $request->phone;
        // $site->mobile = $request->mobile;
        // $site->whatsapp_no = $request->whatsapp_no;
        // $site->fax = $request->fax;
        $site->address = $request->address;
        $site->google_map = $request->google_map;
        // $site->video_id = $request->video_id;

        if (!empty($request->logo)) {
            if (!empty($site->logo)) {
                unlink(public_path() . "/storage/" . $site->getRawOriginal('logo'));
            }
            $site->logo = dataUriToImage($request->logo, 'sites');
        }

        if (!empty($request->favicon)) {
            if (!empty($site->favicon)) {
                unlink(public_path() . "/storage/" . $site->getRawOriginal('favicon'));
            }
            $site->favicon = dataUriToImage($request->favicon, 'sites');
        }

        // $site->facebook_link = $request->facebook_link;
        // $site->instagram_link = $request->instagram_link;
        // $site->twitter_link = $request->twitter_link;
        // $site->linkedin_link = $request->linkedin_link;
        // $site->footer_scripts = $request->footer_scripts;
        // $site->offices = $request->addresses;
        $site->save();

        return redirect()->back()->with("success", "Success! Site information has been updated.");
    }

    public function remove_image(Request $request)
    {
        $site = $this->site;
        if (!empty($site->{$request->field})) {
            Storage::delete($site->getRawOriginal($request->field));
        }
        $site->{$request->field} = null;
        $site->save();

        return redirect()->back()->with('success', 'Success! Image has been removed.');
    }
}
