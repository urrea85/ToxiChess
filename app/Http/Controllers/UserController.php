<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        return view('panelAdmin');
    }

    public function show(Request $request, $attribute, $value){
        $users=[];
        switch($attribute){
            case "id":
                $user = User::find($value);
                if($user != null){
                    $users = [$user];
                }
                break;
            case "name":
                $users = User::where('name', 'like', $value.'%')->paginate();
                break;
            case "nick":
                $users = User::where('nickname', 'like', $value.'%')->paginate();
                break;
            case "email":
                $users = User::where('email', 'like', $value.'%')->paginate();
                break;
            case "games":
                $users = User::where('total_games', $value)->paginate();
                break;
            case "all":
                $users = User::paginate();
                break;
        }
        return view('panelAdmin', compact('users'));
    }


}
