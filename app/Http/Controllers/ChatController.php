<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Events\NewMessage;

class ChatController extends Controller
{

    public function index(){
        return view("chat");
    }

    public function sendMessage(Request $request){
        Log::debug("Message Received: $request->message");
        broadcast(new NewMessage($request->message));
    }
}
