<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GamesController extends Controller
{
    public function index(){
        $games = Game::paginate();
        return view('historial', compact('games'));
    }

    public function delete(Request $request){
        $existe = Game::where('id',$request->input('idGame') );
        if(!$existe->exists()){
            $message = "Error: partida no existente";
            return back()->with('message', $message);
        }
        else{
            $existe->delete();
            return back();
        }
    }
}
