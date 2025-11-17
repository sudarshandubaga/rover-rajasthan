<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryMail;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::latest()->paginate(10);
        return view('admin.screens.enquiry.index', compact('enquiries'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $enquiry = Enquiry::where("phone", $request->phone)->firstOrNew();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->message = $request->message;
        $enquiry->save();

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EnquiryMail($request->all()));

        return response()->json([
            'message' => 'Details has been sent, We will contact you shortly.',
            // 'whatsapp' => $whatsapp
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->back()->with("success", "Success! Record has been deleted.");
    }
}
