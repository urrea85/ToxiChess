<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RankingController extends Controller
{
    public function index(Request $request){
        //$users = User::orderBy('puntos')->simplePaginate();
        $users = User::orderBy('nickname')->simplePaginate();
        
        return view('/ranking', compact('users'));
    }

    public function form(Request $request, $attr){
        switch($attr){
            case "total":
                $users = User::orderBy('nickname')->simplePaginate();
                break;
            case "mensual":
                $users = User::orderBy('nickname')->simplePaginate();
                break;
            case "raw":
                $users = User::orderBy('nickname')->simplePaginate();
                break;
        }

        
        return view('/ranking', compact('users'));

    }
}
