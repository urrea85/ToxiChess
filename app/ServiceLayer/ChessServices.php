<?php
namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;

class ChessServices{
    public static function finishGame($winningSide){
        DB::transaction(function () use($winningSide){
            foreach (DB::table('votes')->select('user_id')->distinct()->get() as $user){
                $side = DB::table('votes')->select('side')->where('user_id','=',$user->user_id)->orderBy('turn','desc')->first()->side ? "white" : "black";
                $points = 0;
                if ($winningSide=="draw"){
                    $points = random_int(50,90);
                }
                elseif ($side==$winningSide){
                    $points = random_int(110,170);
                }
                else{
                    $points = random_int(10,50);
                }
                DB::table('dailypoints')->insert(['points' => $points , 'user_id' => $user->user_id]);
                DB::table('users')->where('id','=',$user->user_id)->increment('total_games',1);
            }
            DB::table('votes')->delete();
        });
    }
}