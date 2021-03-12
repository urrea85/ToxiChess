<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\User;
use App\Game;
use App\Comment;

class AssociationsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAssociationUserComment()
    {
        $user = new User();
        $user->name = 'guillermo';
        $user->email = 'guille@gmail.com';
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi';
        $user->nickname = 'willy';
        $user->save();

        $comment = new Comment();
        $comment->content = 'OMG';
        $comment->color = true;
        $comment->game_id = 3;
        $user->comments()->save($comment);
        

        $this->assertEquals($comment->user->name, 'guillermo');
        $this->assertEquals($user->comments[0]->content,'OMG');

        $comment->delete();
        $user->delete();
        
    }

    public function testAssociationGameComment()
    {
        $game = new Game();
        $game->moves = 'Esto es una prueba';
        $game->save();

        $comment = new Comment();
        $comment->content = 'OMG what a move';
        $comment->color = false;
        $comment->user_id = 3;
        $game->comments()->save($comment);
        
        $this->assertEquals($comment->game->moves, 'Esto es una prueba');
        $this->assertEquals($game->comments[0]->content,'OMG what a move');

        $comment->delete();
        $game->delete();
    }
}
