<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'sujet', 'message', 'seen', 'entreprise_id', 'image_url'];

    protected $table = 'contacts';
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
