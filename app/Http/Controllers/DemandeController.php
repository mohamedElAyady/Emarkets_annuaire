<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Annonce;
use App\Models\Demande;
use App\Models\Entreprise;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use TheSeer\Tokenizer\Exception;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::all();

        return view('admin.demandes.all', compact('demandes'));
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
    public function show(Demande $demande)
    {
        return view('admin.demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }


    
public function accepte($id)
{
    $demande = Demande::findOrFail($id);

    // Update the status of the demand to "accepté"
    $demande->status = 'accepté';
    $demande->save();

    // Get the expiration date based on entreprise's pack duration
    $expirationDate = Carbon::now()->addDays($demande->pack->duree);

    // Create an annonce with the specified data
    $annonce = Annonce::create([
        'datePublication' => Carbon::now(),
        'dateExpiration' => $expirationDate,
        'statut' => 'active',
        'categorie' => '--------',
        'entreprise_id' => $demande->entreprise->id,

    ]);


    // Prepare data to be passed to the email template
    $data = [
        'subject' => 'Demande Acceptée',
        'demande' => $demande,
    ];

    // Send email notification
    try {
        Mail::to($demande->entreprise->email)->send(new MailNotify($data));
        return redirect()->route('demandes.index')->with('success', 'Demande accepted successfully');
    } catch (Exception $e) {
        return redirect()->route('demandes.index')->with('success', 'Failed to send email');
    }
}

    public function rejette(Request $request, $id)
    {
        // Validate the form inputs
        $request->validate([
            'motif' => 'required',
        ]);
        $demande = Demande::findOrFail($id);
        
        // Update the status of the demand to "rejeté"
        $demande->status = 'rejeté';
        $demande->motif_refus = $request->input('motif');
        $demande->save();
        
        // Prepare data to be passed to the email template
        $data = [
            'subject' => 'Demande rejeté',
            'demande' => $demande,
        ];
    
        // Send email notification
        try {
            Mail::to($demande->entreprise->email)->send(new MailNotify($data));
            return redirect()->route('demandes.index')->with('success', 'Demande rejeté successfully');
        } catch (Exception $e) {
            return redirect()->route('demandes.index')->with('success', 'Failed to send email');
        }
    }


    public function newDemande(Request $request)
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
