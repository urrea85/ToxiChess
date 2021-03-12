<?php

use App\Comment;
use App\Game;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        $comment = new Comment(['content'=>'Move e7! its check!','color'=>false]);
        $comment->game()->associate(Game::all()->random());
        $comment->user()->associate(User::all()->random());
        $comment->save();

        $comment = new Comment(['content'=>'Nooooooooo','color'=>true]);
        $comment->game()->associate(Game::all()->random());
        $comment->user()->associate(User::all()->random());
        $comment->save();

        $comment = new Comment(['content'=>'We are going to lose!1!!!1!','color'=>false]);
        $comment->game()->associate(Game::all()->random());
        $comment->user()->associate(User::all()->random());
        $comment->save();

        $comment = new Comment(['content'=>'Take care, the best move is Kf3! ','color'=>true]);
        $comment->game()->associate(Game::all()->random());
        $comment->user()->associate(User::all()->random());
        $comment->save();

        $comment = new Comment(['content'=>'Yeeeeeeeeeeeeees','color'=>false]);
        $comment->game()->associate(Game::all()->random());
        $comment->user()->associate(User::all()->random());
        $comment->save();
    }
}
