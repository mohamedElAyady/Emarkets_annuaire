<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
