<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment(['content'=>'Move e7! its check!','color'=>false]);
        $comment->save();
    }
}
