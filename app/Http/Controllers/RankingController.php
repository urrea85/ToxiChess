<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request){
        $users = User::simplePaginate();
        return view('/ranking', compact('users'));
    }
}
