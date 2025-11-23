<?php

namespace App\Http\Controllers;

use App\Mail\BookingEnquiryMail;
use App\Models\BookingEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiries = BookingEnquiry::latest()->paginate(10);
        return view('admin.screens.booking-enquiry.index', compact('enquiries'));
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
            'booking_type'      => 'required',
            'source_city'       => 'required',
            'destination_city'  => 'nullable',
            'travel_date'       => 'required|date',
            'contact_no'        => 'required',
            'vehicle_type'      => 'required',
        ]);

        $enquiry = BookingEnquiry::create($request->all());

        // Send admin email
        Mail::to($this->site->email)
            ->send(new BookingEnquiryMail($enquiry));

        return response()->json([
            'success' => true,
            'message' => 'Booking enquiry submitted successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingEnquiry $bookingEnquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingEnquiry $bookingEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingEnquiry $bookingEnquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingEnquiry $bookingEnquiry)
    {
        $bookingEnquiry->delete();
        return redirect()->back()->with("success", "Success! Record has been deleted.");
    }
}
