<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AcceuilController extends Controller
{
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
        
                return view('acceuil');
            }
            else{
                return view('admin.admin_layout');
            }
        }
        else{
            
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('acceuil');
        }
        else{
            return view('acceuil');
        }
        
    }

    public function Annuaire()
    {
       return view('annuaire');
    }

    public function Acceuil()
    {
        return view('acceuil');
    }
}
