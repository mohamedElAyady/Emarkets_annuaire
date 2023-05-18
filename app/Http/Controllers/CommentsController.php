<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required',
        ]);

         // Create a new comment
         $comment = new Comments();
         $comment->content = $request->input('content');
         $comment->user_id = Auth::id();
         $comment->user_name = Auth::user()->name;
         $comment->save();

 
         // Redirect back or to a specific route
         return redirect()->back()->with('success', 'Comment created successfully.');
    }
}
