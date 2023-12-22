<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\SendEmails;

class SendEmail extends Controller
{
    public function index(Request $request){

           $validateData = $request->validate([
            'name' => ['required'],
            'email' => 'required|email|email:dns',
            'phone' => ['required'],
            'message' => 'required',
        ]);

        
        Mail::to('pateenxfatboyfactory@gmail.com')->send(new SendEmails($request));
        return  redirect('/')->with('success', 'Email Terkirim');


    }
}
