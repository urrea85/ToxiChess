<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use Illuminate\Support\Facades\Log;

class GamesController extends Controller
{
    public function index(){
        $games = Game::orderBy('id','desc')->paginate();
        return view('historial', compact('games'));
    }

    public function delete(Request $request,$id){
        $existe = Game::where('id',$id);
        if(!$existe->exists()){
            $message = "Error: partida no existente";
            return back()->with('message', $message);
        }
        else{
            $existe->delete();
            $message = "Borrado con éxito";
            return back()->with('message', $message);;
        }
    }
}
