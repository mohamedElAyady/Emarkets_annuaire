<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Pack;
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
        return redirect()->back()->with('success', 'Votre message a été envoyé. Merci!');
    }
    public function show(Contact $contact)
    {
        $contact->seen = '1';
        $contact->save();
    
        return view('admin.autre.show_message', compact('contact'));
    }
    public function initTable()
    {
        $contacts = Contact::latest()->get();
        return view('admin.autre.messages', compact('contacts'));
    }

    public function storePack(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'duree' => 'required',
            'prix' => 'required',
        ]);
    
        $pack = new Pack();
        $pack->name = $request->input('name');
        $pack->duree = $request->input('duree');
        $pack->prix = $request->input('prix');
        $pack->save();
    
        return redirect()->route('packs.index')
            ->with('success', 'Pack created successfully');
    }
    

}
