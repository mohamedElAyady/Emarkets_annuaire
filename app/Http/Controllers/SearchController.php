<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Entreprise;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = $request->input('q');

        // Perform the search query on the Annonce model
        $annonces = Annonce::where('statut', 'active')
            ->where(function ($query) use ($searchQuery) {
                $query->whereHas('entreprise', function ($subQuery) use ($searchQuery) {
                    $subQuery->where('raison_sociale', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('type_entreprise', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('ville', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('adresse', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('telephone', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('site_web', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('secteur_activite', 'LIKE', '%' . $searchQuery . '%');
                });
            })
            ->paginate(10);

        return view('annuaire', compact('annonces'));
    }
}
