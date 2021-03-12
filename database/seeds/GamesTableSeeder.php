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

        $game = new Game(['moves'=>'e4 Nc6 Nf3 d5 Pxd5 Qxd5']);
        $game->save();

        $game = new Game(['moves'=>'e4 e5 d4 Pxd4 Qxd4']);
        $game->save();

        $game = new Game(['moves'=>'e4 Nc6 Nf3 d5 e5 e6']);
        $game->save();
        
        $game = new Game(['moves'=>'e4 e6 d3 d5 Nc3 Nf6']);
        $game->save();

        $game = new Game(['moves'=>'d4 Nf6 c4 g6 Nc3 Bg7']);
        $game->save();
        
        $game = new Game(['moves'=>'e4 e5 Dh5 Ac4 Cf6 Dxf7++']);
        $game->save();
    }
}
