<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $fillable = [
        'name',
        'duree',
        'prix',
    ];

    // Relationships
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }
}
