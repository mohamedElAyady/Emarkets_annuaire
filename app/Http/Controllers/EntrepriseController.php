<?php

namespace App\Http\Controllers;


use App\Models\Demande;
use App\Models\Entreprise;
use App\Models\Pack;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Cloudinary\Api\Upload\UploadApi;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntrepriseController extends Controller
{
     public function demande_entreprise()
     {
        return view('demande_entreprise');
     }
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
        $packs = Pack::all();
        return view('admin.entreprises.add',compact('packs'));
    }

    /**
     * Store a newly created resource in storage.
     */
   /*
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
    
        // Save logo to the specified path
        $logo->move(public_path('admin_assets/input_images'), $logoPath);
        $pack = 0;
    
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
            'pack_id' => $pack,
            'logo_url' => $logoPath,
        ]);
    
        // Create a new demand associated with the enterprise
        $demande = new Demande([
            'status' => 'en attente',
            'date_creation' => now(),
            'pack_id' => $pack,
        ]);
        $entreprise->demandes()->save($demande);
    
        return redirect()->route('entreprises.index')
            ->with('success', "L'entreprise a été ajoutée avec succès");
    }*/


    public function store(Request $request)
    {
        $request->validate([
            'raison_sociale' => 'required',
            'type_entreprise' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'secteur_activite' => 'required',
            'description' => 'nullable',
            'logo_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'site_web' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedIn' => 'nullable|url',
            'platform' => 'nullable',
            'lien' => 'nullable',
            'radio_input' => 'required|in:0,1,2',
        ]);
    
        $logo = $request->file('logo_url');
        $logoPath = 'admin_assets/input_images/' . time() . '_' . $logo->getClientOriginalName();
    
        // Save logo to the specified path
        $logo->move(public_path('admin_assets/input_images'), $logoPath);

        // Save the social media URLs as an array in the 'site_web' column
        $siteWebArray = [
            'site_web' => $request->site_web,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedIn' => $request->linkedIn,
        ];
        
        if ($request->platform) {
            $siteWebArray[$request->platform] = $request->lien;
        }        

        $entreprise = Entreprise::create([
            'raison_sociale' => $request->raison_sociale,
            'type_entreprise' => $request->type_entreprise,
            'ville' => $request->ville,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'description' => $request->description,
            'site_web' =>  json_encode($siteWebArray),
            'secteur_activite' => $request->secteur_activite,
            'utilisateur_id' => Auth::id(),
            'pack_id' => $request->radio_input,
            'logo_url' => $logoPath,
        ]);
    
        // Create a new demand associated with the enterprise
        $demande = new Demande([
            'status' => 'en attente',
            'date_creation' => now(),
            'pack_id' => $request->radio_input,
        ]);
        $entreprise->demandes()->save($demande);
    
       // Redirect back or to a specific route
       return redirect()->back()->with('success', 'Comment created successfully.');
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

    if ($request->hasFile('logo_url')) {
        $logo = $request->file('logo_url');
        $logoPath = 'admin_assets/input_images/' . time() . '_' . $logo->getClientOriginalName();

        // Save logo to the specified path
        $logo->move(public_path('admin_assets/input_images'), $logoPath);

        // Update the logo URL
        $entreprise->logo_url = $logoPath;
    }

    // Update the other fields
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
        $entreprise = Entreprise::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('entreprises.index')
        ->with('success','product back successfully') ;
    }
/**
     * Remove the specified resource from storage permantly.
     */
    public function hardDelete($id)
    {
    $entreprise = Entreprise::withTrashed()->findOrFail($id);
    $entreprise->forceDelete();

    return redirect()->route('entreprises.index')
        ->with('success', 'entreprise deleted permanently.');
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

        $this->demandesDelete($id); // Call demandesDelete method
        $entreprise->delete();
        

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise supprimée avec succès');
    }

    public function demandesDelete($id)
    {
        // Find all demandes associated with the entreprise_id
        $demandes = Demande::where('entreprise_id', $id)->get();
    
        // Soft delete each demande
        foreach ($demandes as $demande) {
            $demande->delete();
        }

    }
    
    public function simplifySocialMediaUrls($input)
    {
        // Convert the string to an associative array using json_decode
        $data = json_decode($input, true);
    
        // Create a new array to store the simplified format
        $simplifiedData = [];
    
        // Iterate over the data array and remove the backslashes
        foreach ($data as $key => $value) {
            $simplifiedData[$key] = stripslashes($value);
        }
    
        // Convert the simplified data array back to JSON format
        $simplifiedJson = json_encode($simplifiedData);
    
        return $simplifiedJson;
    }    


}
