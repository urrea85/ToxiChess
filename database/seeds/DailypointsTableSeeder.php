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
        for ($i = 0 ; $i<200 ; $i++){
            $dailypoint = new Dailypoint(['points'=>random_int(1,500)]);
            $dailypoint->user()->associate(User::all()->random());
            $dailypoint->save();
        }
    }
}
