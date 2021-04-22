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
                $users = User::join('dailypoints', 'user_id', '=', 'users.id')->selectRaw('nickname')->selectRaw("SUM(points) as points")->groupBy('user_id')->orderBy('points', 'desc')->simplePaginate();
                break;
            case "mensual":
                $raw = false;
                $date = now()->format("Y-m").'-01';
                $users = User::join('dailypoints', 'user_id', '=', 'users.id')->whereDate('dailypoints.created_at','>=', $date)->selectRaw('nickname')->selectRaw("SUM(points) as points")->groupBy('user_id')->orderBy('points', 'desc')->simplePaginate();
                break;
            case "raw":
                $raw = true;
                $users = User::join('dailypoints', 'user_id', '=', 'users.id')->orderBy('points', 'desc')->simplePaginate();
                break;
        }
        
        return view('/ranking', compact('users'))->with('raw', $raw);

    }
}
