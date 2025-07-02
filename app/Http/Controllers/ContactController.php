<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // List all contact messages (for admin)
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    // Handle contact form submission
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email',
            'message' => 'required|max:2000',
        ]);

        Contact::create($validated);

        return redirect('/contact')->with('success', 'Your message has been sent!');
    }
}