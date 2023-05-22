<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Commentaire;
use App\Models\Entreprise;

class AnnuaireController extends Controller
{
    
    
    public function Annuaire()
    {
        $annonces = Annonce::where('statut', 'active')
            ->join('entreprises', 'annonces.entreprise_id', '=', 'entreprises.id')
            ->orderBy('entreprises.pack_id', 'desc')
            ->orderBy('annonces.created_at', 'desc')
            ->paginate(10);
    
        return view('annuaire', compact('annonces'));
    }
    
    
    


    public function affiche_details($id)
{
    $item = Entreprise::find($id); // Retrieve the information for the specified entreprise

    $socialMediaUrls = json_decode($item->site_web, true);
    $simplifiedUrls = $this->simplifySocialMediaUrls($socialMediaUrls);

    // Increment the vues count of the annonce
    if ($item->annonce) {
        $item->annonce->increment('vues');
    }
    $comments = Commentaire::latest()->get();
    $counts = $comments->count();

    return view('others\article_details', compact('item', 'simplifiedUrls','comments','counts'));
}


    /*public function affiche_details($id)
    {

        $item = Entreprise::find($id); // Retrieve the information for the specified entreprise
        
        $socialMediaUrls = json_decode($item->site_web, true);
        $simplifiedUrls = $this->simplifySocialMediaUrls($socialMediaUrls);
    
        return view('others\article_details', compact('item', 'simplifiedUrls'));
}*/


public function simplifySocialMediaUrls($socialMediaUrls)
{
    $simplifiedUrls = [];
    
    foreach ($socialMediaUrls as $key => $url) {
        $simplifiedUrls[$key] = $url;
    }
    
    return $simplifiedUrls;
}

}
