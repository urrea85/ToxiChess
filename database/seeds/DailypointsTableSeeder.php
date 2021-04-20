<?php


use App\User;
use App\Dailypoint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailypointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $dailypoint = new Dailypoint(['points'=>50]);
        $dailypoint->user()->associate(User::all()->random());
        $dailypoint->save();

        $dailypoint = new Dailypoint(['points'=>23]);
        $dailypoint->user()->associate(User::all()->random());
        $dailypoint->save();

        $dailypoint = new Dailypoint(['points'=>456]);
        $dailypoint->user()->associate(User::all()->random());
        $dailypoint->save();

        $dailypoint = new Dailypoint(['points'=>54]);
        $dailypoint->user()->associate(User::all()->random());
        $dailypoint->save();

        $dailypoint = new Dailypoint(['points'=>563]);
        $dailypoint->user()->associate(User::all()->random());
        $dailypoint->save();
    }
}
