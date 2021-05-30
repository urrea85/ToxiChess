<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Game;
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
        $comment = new Comment();
        $comment->content = $request->message;
        $comment->color = $request->side;
        $comment->user()->associate(User::all()->random());
        $comment->game()->associate(Game::all()->random());
        $comment->save();
        broadcast(new NewMessage(Auth()->user()->nickname.": ".$request->message,$request->side));
    }
}
