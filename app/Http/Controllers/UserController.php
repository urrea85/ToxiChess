<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('panelAdmin');
    }

    public function show(Request $request, $attribute, $value){
        $users ="";
        switch($attribute){
            case "id":
                $users = DB::table('users')
                ->where('id', '=', $value)
                ->get();
                break;
            case "name":
                $users = DB::table('users')
                ->where('name', '=', $value)
                ->get();
                break;
            case "nick":
                $users = DB::table('users')
                ->where('nickname', '=', $value)
                ->get();
                break;
            case "email":
                $users = DB::table('users')
                ->where('email', '=', $value)
                ->get();
                break;
            case "games":
                $users = DB::table('users')
                ->where('total_games', '=', $value)
                ->get();
                break;
            case "all":
                $users = User::paginate();
                break;
        }
        return view('panelAdmin', compact('users'));
    }


}
