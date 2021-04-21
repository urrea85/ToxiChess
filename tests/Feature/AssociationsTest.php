<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\User;
use App\Game;
use App\Comment;
use App\Dailypoint;

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

    public function testAssociationDailypointUser()
    {
        

        $user = new User();
        $user->name = 'messi';
        $user->email = 'messirve@gmail.com';
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMj';
        $user->nickname = 'messiXxX';
        $user->save();

        $dailypoint = new Dailypoint();
        $dailypoint->points = 435;
        $user->dailypoints()->save($dailypoint);
        
        $this->assertEquals($user->dailypoint->points, 435);
        $this->assertEquals($dailypoint->user->name,'messiXxX');

        $user->delete();
        $dailypoint->delete();
    }
    
}
