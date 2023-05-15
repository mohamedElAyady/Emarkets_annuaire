<?php

namespace App\Http\Controllers;
use App\Models\entreprise;
use Illuminate\Http\Request;


class EntrepriseController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
        'ent_nom' => 'required',
        'ent_address' => 'required',
        'ent_telephone' => 'required',
        'ent_site' => 'required',
        'ent_secteur' => 'required',
       'ent_email' => 'required|email',
     ]);
     entreprise::create($data);
     return redirect()->back()->with('success', 'Data saved successfully!');
    }
}
