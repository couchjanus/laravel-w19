<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\Thanks;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendThanksMail()
    {
        $email = 'info@my.cat';
   
        $maildata = [
            'title' => 'Info Cat Mail Sending Thanks with Markdown',
            'body' => 'Body: This is for testing email using smtp',
            'url' => 'https://lara.vel'
        ];
        Mail::to($email)->send(new Thanks($maildata));
        return view('emails.thanks');
        
    }
}
