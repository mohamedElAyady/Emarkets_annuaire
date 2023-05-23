<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->back()->with('success', 'Password has been changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'ville' => 'required',
            'telephone' => 'required',
            'zip' => 'required',
        ]);

        if ($request->hasFile('profile_image')) {
            
            $logo = $request->file('profile_image');
            $logoPath = 'admin_assets/input_images/' . time() . '_' . $logo->getClientOriginalName();
        
            // Save logo to the specified path
            $logo->move(public_path('admin_assets/input_images'), $logoPath);
            $user->profile_photo_path = $logoPath;
        }

        $user->prenom = $request->input('prenom');
        $user->nom = $request->input('nom');
        $user->email = $request->input('email');
        $user->ville = $request->input('ville');
        $user->telephone = $request->input('telephone');
        $user->zip = $request->input('zip');

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
