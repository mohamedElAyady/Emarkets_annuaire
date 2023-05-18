<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = User::all();
        return view('admin/utilisateurs/all',compact('utilisateurs'));
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function poubelle()
    {
        $utilisateurs = User::onlyTrashed()->get();
        return view('admin/utilisateurs/trash',compact('utilisateurs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/utilisateurs/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'ville'=>'required',
            'zip'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $utilisateur = User::create($input);
    
        return redirect()->route('utilisateurs.index')
            ->with('success',"L'utilisateur a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */

    public function show(User $utilisateur)
    {
        return view('admin/utilisateurs/show', compact('utilisateur'))  ;
    }

    /**
     * Show the form for editing a new resource.
     */
    
    public function edit(User $utilisateur)
    {
        return view('admin.utilisateurs.edit', compact('utilisateur'))  ;
    }

    /*Update the specified resource in storage.*/
   
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'ville'=>'required',
            'zip'=>'required',
            'telephone'=>'required',
            'email'=>'required',
        ]);

        $utilisateur = User::find($id);

        $utilisateur->prenom = $request->input('prenom');
        $utilisateur->nom = $request->input('nom');
        $utilisateur->ville = $request->input('ville');
        $utilisateur->email = $request->input('email');
        $utilisateur->zip = $request->input('zip');
        $utilisateur->telephone = $request->input('telephone');

        $utilisateur->save();

        return redirect()->route('utilisateurs.index', $id)->with('success', 'Utilisateur modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage .
     */
   public function softDelete($id)
    {
        $utilisateur = User::find($id);

        if (!$utilisateur) {
            return redirect()->route('utilisateurs.index')
                ->with('error', 'Utilisateur not found');
        }
        $this->entrepriseDelete($id);
        $utilisateur->delete();
    
        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur deleted successfully');
    }

    /**
     * restore the specified resource from trash .
     */
    public function restore($id)
    {
        $utilisateur = User::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('utilisateurs.index')
        ->with('success','product back successfully') ;
    }
/**
     * Remove the specified resource from storage permantly.
     */
    public function hardDelete($id)
    {
    $utilisateur = User::withTrashed()->findOrFail($id);
    $utilisateur->forceDelete();

    return redirect()->route('utilisateurs.index')
        ->with('success', 'Utilisateur deleted permanently.');
    }

    

    public function entrepriseDelete($id)
    {
        // Find all demandes associated with the entreprise_id
        $entreprises = Entreprise::where('utilisateur_id', $id)->get();
    
        // Soft delete each demande
        foreach ($entreprises as $entreprise) {
            $d = new EntrepriseController();
            $d->demandesDelete($entreprise->id);
            $entreprise->delete();
            
        }

    }
    

}
