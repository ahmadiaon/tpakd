<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from TPAKD',
            'body' => 'This is for testing email using smtp.'
        ];   
        //  dd($mailData);
        Mail::to('clanuciha31@gmail.com')->send(new SendMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
