<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use App\Rules\MatchOldPassword;
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
    $logoName = time() . '_' . $logo->getClientOriginalName();
    $logoPath = $logo->storeAs('public/admin_assets/input_images', $logoName);


    $entreprise = Entreprise::create([
        'raison_sociale' => $request->raison_sociale,
        'type_entreprise' => $request->type_entreprise,
        'ville' => $request->ville,
        'adresse' => $request->adresse,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'password' => $request->password,
        'utilisateur_id' => $request->utilisateur_id,
        'logo_url' => $logoPath,
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

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'raison_sociale' => 'required',
            'type_entreprise' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
        ]);

        $entreprise = Entreprise::findOrFail($id);

        $entreprise->raison_sociale = $request->input('raison_sociale');
        $entreprise->type_entreprise = $request->input('type_entreprise');
        $entreprise->ville = $request->input('ville');
        $entreprise->adresse = $request->input('adresse');
        $entreprise->email = $request->input('email');
        $entreprise->telephone = $request->input('telephone');

        $entreprise->save();

        return redirect()->route('entreprises.index', $id)->with('success', 'L\'entreprise a été modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDelete($id)
    {
        $entreprise = Entreprise::findOrFail($id);

        if (!$entreprise) {
            return redirect()->route('entreprises.index')
                ->with('error', 'Entreprise non trouvée');
        }

        $entreprise->delete();

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise supprimée avec succès');
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
