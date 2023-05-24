<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::whereHas('entreprise', function ($query) {
            $query->whereNull('deleted_at');
        })->get();
    
        return view('admin.annonces.all', compact('annonces'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'statut' => 'required|in:active,désactive',
        ]);

        $annonce->statut = $request->statut;
        $annonce->save();

        return response()->json(['message' => 'Statut updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        //
    }


    public function changeStatus(Request $request)
{
    // Get the announcement ID from the request
    $annonceId = $request->input('AnnId');

    // Find the announcement in the database
    $annonce = Annonce::find($annonceId);

    if ($annonce) {
        // Update the status based on the current value
        $newStatus = $annonce->statut === 'active' ? 'désactivé' : 'active';
        $annonce->statut = $newStatus;
        $annonce->save();

        // Return the new status as the response
        return response()->json($newStatus);
    }

    // Announcement not found, return an error response
    return response()->json('error', 404);
}
    public function adminChangeStatus(Request $request)
{
    // Get the announcement ID from the request
    $annonceId = $request->input('AnnId');

    // Find the announcement in the database
    $annonce = Annonce::find($annonceId);

    if ($annonce) {
        // Update the status based on the current value
        if ($annonce->statut == 'active' ) {
            $newStatus = 'stop';
        }else{
            $newStatus = 'active';
        }
        $annonce->statut = $newStatus;
        $annonce->save();

        // Return the new status as the response
        return response()->json($newStatus);
    }

    // Announcement not found, return an error response
    return response()->json('error', 404);
}
}
