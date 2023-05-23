<?php

namespace App\Providers;

use App\Models\Commentaire;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Demande;
use Carbon\Carbon;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('admin.admin_layout', function ($view) {
            $demandes = Demande::with('entreprise')->latest()->get();
            $notifications = [];
            Carbon::setLocale('fr');
            $count = 0;
            foreach ($demandes as $demande) {
                if ($demande->entreprise) {
                    $raisonSociale = $demande->entreprise->raison_sociale;
                    $telephone = $demande->entreprise->telephone;
                    $demande_id = $demande->id;
                    $status = $demande->status;
                    $dateSoumission = Carbon::parse($demande->date_creation)->diffForHumans();
                    if ($status === 'en attente') {
                        $count++;
                        $notification = [
                            'demande_id' => $demande_id,
                            'raison_sociale' => $raisonSociale,
                            'telephone' => $telephone,
                            'date_soumission' => $dateSoumission
                        ];
    
                        $notifications[] = $notification;
                    }
                }
            }
    
            $contacts = Contact::where('seen', '0')->latest()->get();
            $contactsCount = $contacts->count();
    
            $view->with(compact('notifications', 'count', 'contacts', 'contactsCount'));
        });

        View::composer('entreprise.entreprise_layout', function ($view) {
            $notifications = Commentaire::with('entreprise.utilisateur')
                ->whereHas('entreprise.utilisateur', function ($query) {
                    $query->where('id', Auth::id());
                })
                ->where('seen', 0)
                ->orderBy('created_at', 'desc')
                ->get();
                
            $count = $notifications->count();
        
            $view->with(compact('notifications', 'count'));
        });
        
    }

}
