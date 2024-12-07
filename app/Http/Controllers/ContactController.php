<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('pages.contact');
    }

    // Handle the form submission
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store the data in the database
        Contact::create($validatedData);

        // Return a success message (flash data)
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}

