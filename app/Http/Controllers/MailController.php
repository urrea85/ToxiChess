<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function create(Request $request){
        $details=[
            'subject' => $request->input('subject'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'body' => $request->description,
        ];
        \Mail::to('sltoxichess@gmail.com')->send(new \App\Mail\ContactMail($details));
        return back();
    }
}
