<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Entreprise;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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

        // Convert the message to HTML
        $htmlMessage = nl2br($request->message);

        // Process the form data and send an email, save to the database, etc.
        $contact = Contact::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'sujet' => $request->sujet,
            'message' => $htmlMessage,
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



    public function supportContact(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'sujet' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|max:2048', // Maximum file size of 2MB
        ]);
    
        $user = Auth::user();
        $entreprise = Entreprise::where('utilisateur_id', Auth::id())->first();
    
        // Convert the message to HTML
        $htmlMessage = nl2br($request->message);
    
        // Process the form data and send an email, save to the database, etc.
        $contactData = [
            'nom' => $user->nom,
            'prenom' => $user->prenom,
            'email' => $user->email,
            'sujet' => $request->sujet,
            'message' => $htmlMessage,
            'entreprise_id' => $entreprise->id,
        ];
    
        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'admin_assets/input_images/' . time() . '_' . $image->getClientOriginalName();
            // Save image to the specified path
            $image->move(public_path('admin_assets/input_images'), $imagePath);
            $contactData['image_url'] = $imagePath;
        }
    
        $contact = Contact::create($contactData);
    
        // Redirect back to the contact form with a success message
        return redirect()->back()->with('success', 'Votre message a été envoyé. Merci!');
    }
    

}
