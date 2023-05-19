<?php

namespace App\Http\Controllers;
use App\Models\Pack;
use Illuminate\Http\Request;


class PackController extends Controller
{
    public function index()
    {
        $packs = Pack::all();

        return view('admin.autre.packs', compact('packs'));
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'duree' => 'required',
            'prix' => 'required',
        ]);
    
        $id = $request->input('id');
    
        // Check if the ID already exists
        $existingPack = Pack::find($id);
        if ($existingPack) {
            // Call the updateData() method
            return $this->updateData($request, $existingPack);
        }
    
        $pack = new Pack();
        $pack->id = $id;
        $pack->name = $request->input('name');
        $pack->duree = $request->input('duree');
        $pack->prix = $request->input('prix');
        $pack->save();
    
        return redirect()->route('packs.index')
            ->with('success', 'Pack created successfully');
    }
    
    public function updateData(Request $request, Pack $pack)
    {
        $pack->name = $request->input('name');
        $pack->duree = $request->input('duree');
        $pack->prix = $request->input('prix');
        $pack->save();
    
        return redirect()->route('packs.index')
            ->with('success', 'Pack updated successfully');
    }
    
    
}
