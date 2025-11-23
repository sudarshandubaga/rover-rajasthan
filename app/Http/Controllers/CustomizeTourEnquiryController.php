<?php

namespace App\Http\Controllers;

use App\Mail\CustomizeTourEnquiryMail;
use App\Models\CustomizeTourEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomizeTourEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiries = CustomizeTourEnquiry::latest()->paginate(10);
        return view('admin.screens.customize-tour.index', compact('enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Personal Info
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'max:255'],

            // Trip Details
            'destinations'  => ['nullable', 'string', 'max:255'],
            'start_date'    => ['nullable', 'date'],
            'end_date'      => ['nullable', 'date', 'after_or_equal:start_date'],
            'travelers'     => ['nullable', 'integer', 'min:1'],

            // Preferences
            'budget'        => ['nullable', 'string', 'max:50'],
            'interests'     => ['nullable', 'array'],
            'accommodation' => ['nullable', 'string', 'max:50'],
            'pace'          => ['nullable', 'string', 'max:50'],

            // Notes
            'notes'         => ['nullable', 'string'],
        ]);

        // Convert interests to JSON
        $validated['interests'] = $request->interests ? json_encode($request->interests) : null;

        $enquiry = CustomizeTourEnquiry::create($validated);

        Mail::to($this->site->email)->send(new CustomizeTourEnquiryMail($enquiry));

        return redirect()->back()->with('success', 'Your travel enquiry has been submitted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomizeTourEnquiry $customizeTourEnquiry)
    {
        $customizeTourEnquiry->delete();
        return redirect()->back()->with("success", "Success! Record has been deleted.");
    }
}
