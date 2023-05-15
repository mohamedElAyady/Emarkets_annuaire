<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Demande;
use App\Models\Entreprise;
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
        $demandes = Demande::with('entreprise')->latest()->get(); // Retrieve demandes with associated entreprise, ordered by the latest
        $notifications = [];
        Carbon::setLocale('fr');
        $count = 0;
        foreach ($demandes as $demande) {
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

        $view->with('notifications', $notifications);
        $view->with('count', $count);
    });
    }


}
