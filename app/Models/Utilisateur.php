<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utilisateur extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'nom',
        'prenom',
        'ville',
        'zip',
        'telephone',
        'email',
        'password',
    ];
    protected $dates = ['deleted_at'];
}