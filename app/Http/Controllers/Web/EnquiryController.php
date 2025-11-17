<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^\d{10}$/',
            'message' => 'required|string',
        ], [
            'mobile.regex' => 'Please enter 10 digit valid mobile number.'
        ]);

        // Handle form submission (e.g., send an email or store in DB)

        return back()->with('success', 'Enquiry submitted successfully!');
    }
}
