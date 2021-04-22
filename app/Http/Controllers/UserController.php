<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        return view('panelUser');
    }

    public function store(Request $request){
        
        $user = new User;
        if (!User::where('nickname',$request->input('nickname') )->exists()) {
            $user->nickname      = $request->input('nickname');
        }else{
            $error="Error: nickname already exists!";
            return back()->with('error', $error);
        }

        if (!User::where('email',$request->input('email') )->exists()) {
            $user->email      = $request->input('email');
        }else{
            $error="Error: email already exists!";
            return back()->with('error', $error);
        }
            $user->name = "";
            $user->password = $request->input('password');
            $user->save();

            //$request->session()->put('user', $request->input('nickname'));

            //redirect

            
            return back()->with('data',$user);
    }

    public function show(Request $request, $attribute, $value){
        $users=[];
        switch($attribute){
            case "id":
                $users = User::where('id',$value)->paginate();
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
        return view('panelUser', compact('users'));
    }

    public function firstUser(Request $request){
        $user = User::first();
        return view('perfil', compact('user'));
    }

    public function delete(Request $request, $id){
        $existe = User::where('id',$id );
        if(!$existe->exists()){
            $message = "Usuario no existe";
            return back()->with('message', $message);
        }
        else{
            $existe->delete();
            return view('perfil');
        }
    }

    public function update(Request $request){
        $update = User::where('id',$request->input('Id') );
        $existe = User::find($request->input('Id') );
        if(!$existe->exists()){
            $message = "Usuario no existe";
            return view('perfil', compact('message'));
        }
        else{
            if (User::where('nickname',$request->input('Nickname'))->exists() && $existe->nickname!=$request->input('Nickname')) {
                $message="Error: nickname already exists!";
                return view('perfil', compact('message'));
            }else{
                if (User::where('email',$request->input('Email'))->exists() && $existe->email!=$request->input('Email')) {
                    $message="Error: email already exists!";
                    return view('perfil', compact('message'));
                }else{
                    $update->update(array(
                        'nickname'=>$request->input('Nickname'),
                        'name'=>$request->input('Name'),
                        'email'=>$request->input('Email'),
                        'password'=>$request->input('Password')
                    ));
                    $message="Actualizado correctamente";
                    return view('perfil', compact('message'));
                }
            } 
        }
    }
}
