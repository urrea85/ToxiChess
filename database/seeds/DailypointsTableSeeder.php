<?php

use Illuminate\Database\Seeder;

class DailypointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $dailypoint = new Dailypoints(['points'=>'50 PUNTOS']);
        $dailypoint->save();

        $dailypoint = new Dailypoints(['points'=>'23 PUNTOS']);
        $dailypoint->save();

        $dailypoint = new Dailypoints(['points'=>'456 PUNTOS']);
        $dailypoint->save();

        $dailypoint = new Dailypoints(['points'=>'54 PUNTOS']);
        $dailypoint->save();

        $dailypoint = new Dailypoints(['points'=>'563 PUNTOS']);
        $dailypoint->save();
    }
}
