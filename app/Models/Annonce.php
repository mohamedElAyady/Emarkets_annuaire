<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\Paginator;

class Annonce extends Model
{
    protected $fillable = [
        'datePublication',
        'dateExpiration',
        'categorie',
        'statut',
        'entreprise_id',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

}
