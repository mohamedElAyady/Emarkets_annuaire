<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;
use TheSeer\Tokenizer\Exception;

class MailController extends Controller
{
public function index()
{
    $data = [
        'subject' => 'Welcome to Cambo Tutorial',
        'body' => 'Hello friends, Welcome to Cambo Tutorial Mail Delivery!'
    ];

    // Send email notification
    try {
        Mail::to('moha.elayady@gmail.com')->send(new MailNotify($data));
        return response()->json(['message' => 'Great! Successfully sent to your email']);
    } catch (Exception $e) {
        return response()->json(['message' => 'Sorry! Please try again later']);
    }
}
}
