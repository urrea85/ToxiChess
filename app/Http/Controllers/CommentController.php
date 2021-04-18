<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Game;

class CommentController extends Controller
{

    public function index(){
        return view('panelComment');
    }

    public function show(Request $request, $attribute, $value){

        $comments=[];
        switch($attribute){
            case "id":
                $comments = Comment::where('id',$value)->paginate();
                break;
            case "content":
                $comments = Comment::where('content', 'like', $value.'%')->paginate();
                break;
            case "user":
                $comments = Comment::where('user_id', 'like', $value.'%')->paginate();
                break;
            case "all":
                $comments = Comment::paginate();
                break;
        }
        return view('panelComment', compact('comments'));
    }

    public function update(Request $request, $id, $content){

        Comment::where('id', $id)->update(array(
            'content'=>$content,
        ));
    }
}
