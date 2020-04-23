<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class MessageController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store()
    {
       $message = request()->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);

        Mail::to('tomifno1@gmail.com')->queue(new MessageReceived($message));

        $amsg = "Sended";

        return view('contact', compact('amsg'));
    }
}
