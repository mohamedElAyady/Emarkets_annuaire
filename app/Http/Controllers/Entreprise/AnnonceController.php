<?php
namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Commentaire;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AnnonceController extends Controller
{
    
    
    public function index()
    {

    }
    
    
    
    


    public function affiche_details()
{

    $userId = Auth::id();
    $id = Entreprise::where('utilisateur_id', $userId)->value('id');
    
    $item = Entreprise::find($id); // Retrieve the information for the specified entreprise

    $socialMediaUrls = json_decode($item->site_web, true);
    $simplifiedUrls = $this->simplifySocialMediaUrls($socialMediaUrls);

    $comments = Commentaire::where('entreprise_id', $id)->latest()->get();
    foreach ($comments as $comment) {
        $comment->seen = 1;
        $comment->save();
    }
    $counts = $comments->count();

    return view('/entreprise/annonce', compact('item', 'simplifiedUrls','comments','counts'));
}


public function simplifySocialMediaUrls($socialMediaUrls)
{
    $simplifiedUrls = [];
    
    foreach ($socialMediaUrls as $key => $url) {
        $simplifiedUrls[$key] = $url;
    }
    
    return $simplifiedUrls;
}

public function destroy($id)
{
    $comment = Commentaire::find($id);
    if (!$comment) {
        return redirect()->back()->with('success', 'Error !');
    }
    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully.');
}

public function toggleStatut(Request $request)
{
    $id = $request->input('entreprise_id');
    $annonce = Annonce::where('entreprise_id', $id)->first();

        // Toggle the statut value
        $statut = ($annonce->statut === 'active') ? 'désactivé' : 'active';
        $annonce->update(['statut' => $statut]);
    

    return redirect()->back();
}



}
