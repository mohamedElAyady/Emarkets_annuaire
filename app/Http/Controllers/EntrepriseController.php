<?php

namespace App\Http\Controllers;


use App\Models\Entreprise;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Cloudinary\Api\Upload\UploadApi;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntrepriseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('admin.entreprises.all', compact('entreprises'));
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function poubelle()
    {
        $entreprises = Entreprise::onlyTrashed()->get();
        return view('admin.entreprises.trash', compact('entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.entreprises.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'raison_sociale' => 'required',
        'type_entreprise' => 'required',
        'ville' => 'required',
        'adresse' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'utilisateur_id' => 'required',
        'logo_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
    $logo = $request->file('logo_url');
    $logoPath = 'admin_assets/input_images/' . time() . '_' . $logo->getClientOriginalName();

    // Upload logo to Cloudinary
    $uploadApi = new UploadApi();
    $uploadResult = $uploadApi->upload($logo->getRealPath(), [
        'folder' => $logoPath,
    ]);
    


    $entreprise = Entreprise::create([
        'raison_sociale' => $request->raison_sociale,
        'type_entreprise' => $request->type_entreprise,
        'ville' => $request->ville,
        'adresse' => $request->adresse,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'description' => $request->description,
        'site_web' => $request->site_web,
        'secteur_activite' => $request->secteur_activite,
        'utilisateur_id' => $request->utilisateur_id,
        'logo_url' => $uploadResult['secure_url'],
    ]);

    return redirect()->route('entreprises.index')
        ->with('success', "L'entreprise a été ajoutée avec succès");
    }
    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        return view('admin.entreprises.show', compact('entreprise'));
    }

    /**
     * Show the form for editing a new resource.
     */
    public function edit(Entreprise $entreprise)
    {
        return view('admin.entreprises.edit', compact('entreprise'));
    }

    /* Update the specified resource in storage. */

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'raison_sociale' => 'required',
            'type_entreprise' => 'required',
            'description' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'logo_url' => 'image|mimes:jpeg,png,jpg|max:2048', // Assuming logo_url is the field for the logo image
            'utilisateur_id' => 'required',
            'site_web' => 'nullable|url',
            'secteur_activite' => 'nullable',
        ]);
    
        $entreprise = Entreprise::findOrFail($id);

        $logo = $request->file('logo_url');
        $logoPath = 'admin_assets/input_images/' . time() . '_' . $logo->getClientOriginalName();

        // Upload logo to Cloudinary
        $uploadApi = new UploadApi();
        $uploadResult = $uploadApi->upload($logo->getRealPath(), [
            'folder' => $logoPath,
        ]);
    
        // Update the fields
        $entreprise->raison_sociale = $request->input('raison_sociale');
        $entreprise->type_entreprise = $request->input('type_entreprise');
        $entreprise->description = $request->input('description');
        $entreprise->ville = $request->input('ville');
        $entreprise->adresse = $request->input('adresse');
        $entreprise->email = $request->input('email');
        $entreprise->telephone = $request->input('telephone');
        $entreprise->utilisateur_id = $request->input('utilisateur_id');
        $entreprise->site_web = $request->input('site_web');
        $entreprise->secteur_activite = $request->input('secteur_activite');
        $entreprise->logo_url = $request->$uploadResult['secure_url'];
    
        

        // Save the updated enterprise
        $entreprise->save();
    
        return redirect()->route('entreprises.index')
            ->with('success', "L'entreprise a été mise à jour avec succès");
    }


    /**
     * restore the specified resource from trash .
     */
    public function restore($id)
    {
        $entreprise = User::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('entreprises.index')
        ->with('success','product back successfully') ;
    }
/**
     * Remove the specified resource from storage permantly.
     */
    public function hardDelete($id)
    {
    $entreprise = User::withTrashed()->findOrFail($id);
    $entreprise->forceDelete();

    return redirect()->route('entreprises.index')
        ->with('success', 'entreprise deleted permanently.');
    }

    public function changePassword(Request $request, $id) {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:8|confirmed',
        ]);
    
        // check if the current password is correct
        if (!Hash::check($request->currentpassword, $user->password)) {
            return redirect()->back()->withErrors(['currentpassword' => 'Mot de passe actuel incorrect.']);
        }
    
        // set the new password
        $user->password = Hash::make($request->newpassword);
        $user->save();
    
        return redirect()->back()->with('success', 'Le mot de passe a été modifié avec succès.');
    }
    

    

    
}
