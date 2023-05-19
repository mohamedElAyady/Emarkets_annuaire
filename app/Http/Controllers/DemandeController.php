<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Annonce;
use App\Models\Demande;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

     /*   
    public function accepte($id)
    {
        $demande = Demande::findOrFail($id);
        
        // Update the status of the demand to "accepté"
        $demande->status = 'accepté';
        $demande->save();
    
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
    }*/

    
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
        'status' => 'active',
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
    
}
