<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('admin/utilisateurs/all',compact('utilisateurs'));
    }

    public function poubelle()
    {
        $utilisateurs = Utilisateur::onlyTrashed()->get();
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

        $utilisateur = Utilisateur::create($request->all());
        return redirect()->route('utilisateurs.index')
        ->with('success',"l'utilisateur a été bien ajouter");
    }

    /**
     * Display the specified resource.
     */

    public function show(Utilisateur $utilisateur)
    {
        return view('admin/utilisateurs/show', compact('utilisateur'))  ;
    }




    /*Update the specified resource in storage.
    
    public function updateUser(Request $request, $id)
{
    
    $utilisateur = Utilisateur::findOrFail($id);

    $request->validate([
        'nom'=>'required',
        'prenom'=>'required',
        'ville'=>'required',
        'zip'=>'required',
        'telephone'=>'required',
        'email'=>'required|email|unique:utilisateurs,email,'.$utilisateur->id,
        'password'=>'required',
    ]);

    $utilisateur->nom = $request->input('nom');
    $utilisateur->prenom = $request->input('prenom');
    $utilisateur->ville = $request->input('ville');
    $utilisateur->zip = $request->input('zip');
    $utilisateur->telephone = $request->input('telephone');
    $utilisateur->email = $request->input('email');
    $utilisateur->password = $request->input('password');
    $utilisateur->save();

    return redirect()->route('utilisateurs.index', $utilisateur->id)
        ->with('success', 'L\'utilisateur a été mis à jour.');
} */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')
        ->with('success',"l'utilisateur a été bien supprimer");
    
    }

   public function softDelete($id)
    {
        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return redirect()->route('utilisateurs.index')
                ->with('error', 'Utilisateur not found');
        }
    
        $utilisateur->delete();
    
        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur deleted successfully');
    }
    public function restore($id)
    {


        $utilisateur = Utilisateur::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('utilisateurs.index')
        ->with('success','product back successfully') ;
    }

    public function hardDelete($id)
{
    $utilisateur = Utilisateur::withTrashed()->findOrFail($id);
    $utilisateur->forceDelete();

    return redirect()->route('utilisateurs.index')
        ->with('success', 'Utilisateur deleted permanently.');
}




}
