<?php

namespace App\Http\Controllers;

use App\Mail\NewFeedbackReceived;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function showFeedbackPage()
    {
        $page = \App\Models\Page::where('slug', 'feedback')->first() ?: new \App\Models\Page([
            'title' => 'Guest Feedback',
            'seo_title' => 'Guest Feedback | ' . $this->site->title,
            'seo_keywords' => 'feedback, guest reviews, taxi service reviews',
            'seo_description' => 'Read what our guests have to say about their journey with us.'
        ]);

        $feedbacks = Feedback::where('is_active', true)->latest()->get();
        return view('web.screens.feedback', compact('feedbacks', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $feedback = Feedback::create($request->all());

        try {
            Mail::to($this->site->email)->send(new NewFeedbackReceived($feedback));
        } catch (\Exception $e) {
            // Log error if mail fails, but don't stop the user
        }

        return redirect()->back()->with('success', 'Thank you for your valuable feedback!');
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(15);
        return view('admin.screens.feedback.index', compact('feedbacks'));
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback deleted successfully.');
    }

    public function toggleStatus(Feedback $feedback)
    {
        $feedback->is_active = !$feedback->is_active;
        $feedback->save();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
