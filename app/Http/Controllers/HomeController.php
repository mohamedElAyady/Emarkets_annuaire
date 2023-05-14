<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
   

    public function index(Demande $demande)
    {   
        $demandes = Demande::all(); // Retrieve demandes from your data source
    
        return view('admin.admin_layout', compact('demandes'));
    }
}
