<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'sujet' => 'required',
            'message' => 'required',
        ]);

        // Process the form data and send an email, save to the database, etc.
        $contact = Contact::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'sujet' => $request->sujet,
            'message' => $request->message,
        ]);
        // Redirect back to the contact form with a success message
        return redirect()->back()->with('success', 'Votre message a été envoyé. Merci!
');
    }
}
