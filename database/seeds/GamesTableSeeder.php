<?php

use Illuminate\Database\Seeder;
use App\Game;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->delete();

        $game = new Game(['moves'=>'e4 Nc6 Nf3 d5 Pxd5 Qxd5','result'=>'white']);
        $game->save();

        $game = new Game(['moves'=>'e4 e5 d4 Pxd4 Qxd4', 'result'=>'black']);
        $game->save();

        $game = new Game(['moves'=>'e4 Nc6 Nf3 d5 e5 e6', 'result'=>'black']);
        $game->save();
        
        $game = new Game(['moves'=>'e4 e6 d3 d5 Nc3 Nf6', 'result'=>'draw']);
        $game->save();

        $game = new Game(['moves'=>'d4 Nf6 c4 g6 Nc3 Bg7', 'result'=>'draw']);
        $game->save();
        
        $game = new Game(['moves'=>'e4 e5 Dh5 Ac4 Cf6 Dxf7++', 'result'=>'white']);
        $game->save();

        for ($i = 0 ; $i<100 ; $i++){
            $game = new Game(['moves'=>"moves$i", 'result'=>'white']);
            $game->save();
        }
    }
}
