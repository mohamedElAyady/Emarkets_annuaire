<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'date_creation',
        'remarque',
        'pack',
        'status',
        'entreprise_id',
        'pack_id',
    ];

    // Relationship with Entreprise model
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}
