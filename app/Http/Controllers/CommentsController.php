<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required',
        ]);

         // Create a new comment
         $comment = new Comment();
         $comment->content = $request->input('content');
         $comment->user_id = Auth::id();
         $comment->user_name = Auth::user()->name;
         $comment->save();

         
    $comment = Commentaire::create([
        'user_id' => $request->user_id,
        'user_name' => $request->user_name,
        'content' => $request->content,

    ]);
 
         // Redirect back or to a specific route
         return redirect()->back()->with('success', 'Comment created successfully.');
    }
}
