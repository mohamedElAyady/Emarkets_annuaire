<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo Auth::user()->id;  ;
        $utilisateurs = User::all();
        return view('admin/utilisateurs/all',compact('utilisateurs'));
    }

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

        $utilisateur = User::create($request->all());
        return redirect()->route('utilisateurs.index')
        ->with('success',"l'utilisateur a été bien ajouter");
    }

    /**
     * Display the specified resource.
     */

    public function show(User $utilisateur)
    {
        return view('admin/utilisateurs/show', compact('utilisateur'))  ;
    }

    public function edit(User $utilisateur)
    {
        return view('admin/utilisateurs/edit', compact('utilisateur'))  ;
    }




    /*Update the specified resource in storage.*/
    
    public function update(Request $request, User $utilisateur)
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

        $utilisateur->update($request->all());
        return redirect()->route('utilisateurs.index')
        ->with('success',"l'utilisateur a été bien modifier");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')
        ->with('success',"l'utilisateur a été bien supprimer");
    
    }

   public function softDelete($id)
    {
        $utilisateur = User::find($id);

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


        $utilisateur = User::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('utilisateurs.index')
        ->with('success','product back successfully') ;
    }

    public function hardDelete($id)
{
    $utilisateur = User::withTrashed()->findOrFail($id);
    $utilisateur->forceDelete();

    return redirect()->route('utilisateurs.index')
        ->with('success', 'Utilisateur deleted permanently.');
}




}
