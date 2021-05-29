<?php

namespace App\Http\Controllers;
use App\User;
use App\Dailypoint;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RankingController extends Controller
{
    public function form(Request $request, $attr){

        switch($attr){
            case "total":
                $raw = false;
                $users = User::join('dailypoints', 'user_id', '=', 'users.id')->selectRaw('nickname')->selectRaw("SUM(points) as points")->groupBy('user_id')->orderBy('points', 'desc')->Paginate();
                break;
            case "mensual":
                $raw = false;
                $date = now()->format("Y-m").'-01';
                $users = User::join('dailypoints', 'user_id', '=', 'users.id')->whereDate('dailypoints.created_at','>=', $date)->selectRaw('nickname')->selectRaw("SUM(points) as points")->groupBy('user_id')->orderBy('points', 'desc')->Paginate();
                break;
            case "raw":
                $raw = true;
                $users = User::join('dailypoints', 'user_id', '=', 'users.id')->orderBy('points', 'desc')->Paginate();
                break;
        }
        
        return view('/ranking', compact('users'))->with('raw', $raw);
    }

    public function delete(Request $request, $attr){
        
        $existe = Dailypoint::where('id',$attr);
        if(!$existe->exists()){
            $message = "Error: Id de puntos no existe";
            return back()->with('message', $message);
        }
        else{
            $existe->delete();
            $message = "Borrado con éxito";
            return back()->with('message', $message);
        }
    }
}
