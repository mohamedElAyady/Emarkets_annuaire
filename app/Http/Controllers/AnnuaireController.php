<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class AnnuaireController extends Controller
{
    public function Annuaire()
    {
        $annonces = Annonce::where('statut', 'active')->get();
        return view('annuaire', compact('annonces'));
    }

    public function affiche_details($id)
    {
        $info = Entreprise::find($id); // Retrieve the information for the specified entreprise

        return view('card_details', compact('info'));
    }
}
