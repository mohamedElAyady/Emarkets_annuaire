<?php

namespace App\Http\Controllers;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'entreprise_id' => 'required|exists:entreprises,id',
        ]);

        if (!Auth::check()) {
            // User is not logged in, redirect to the account creation page
            return redirect()->route('login')->with('info', 'Please create an account to add a comment.');
        }


        $commentaire = Commentaire::create([
            'content' => $request->content,
            'utilisateur_id' => Auth::id(),
            'entreprise_id' => $request->entreprise_id,
        ]);

        // Additional actions after saving the commentaire if needed

        return redirect()->back()->with('success', 'Commentaire has been added successfully.');
    }
    public function destroy($id)
    {
        $comment = Commentaire::find($id);
        if (!$comment) {
            return redirect()->back()->with('success', 'Error !');
        }
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Commentaire::find($request->input('id'));

        if (!$comment) {
        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Error !');
        }
        // Update the comment content
        $comment->content = $request->input('content');
        $comment->save();
        
        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Comment updated successfully.');
    }
    

}
