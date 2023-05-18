<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Entreprise extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'raison_sociale',
        'type_entreprise',
        'description',
        'ville',
        'adresse',
        'email',
        'telephone',
        'logo_url',
        'utilisateur_id',
        'site_web',
        'secteur_activite',
        'pack_id',
    ];
    protected $dates = ['deleted_at'];


    // Define the relationship with the User model
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
    
}
