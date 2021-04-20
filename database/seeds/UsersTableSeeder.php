<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Dailypoint;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        $user = new User([
                'name'=>'pepe',
                'email'=>'a@b.com',
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
                'nickname'=>'xXpepeXx']);
        $user->dailypoint()->associate(Dailypoint::all()->random());        
        $user->save();

        $user = new User([
            'name'=>'juan',
            'email'=>'b@b.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'juan13']);
        $user->dailypoint()->associate(Dailypoint::all()->random()); 
        $user->save();

        $user = new User([
            'name'=>'moi',
            'email'=>'moi@b.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'byMoiXx']);
        $user->dailypoint()->associate(Dailypoint::all()->random()); 
        $user->save();

        $user = new User([
            'name'=>'Joselito',
            'email'=>'Joseli@asd.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'Er_JosEh']);
        $user->dailypoint()->associate(Dailypoint::all()->random()); 
        $user->save();
        
        $user = new User([
            'name'=>'raul',
            'email'=>'raul123@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'theraulitoOMG']);
        $user->dailypoint()->associate(Dailypoint::all()->random()); 
        $user->save();

        for($i = 0; $i<100; $i++){
            $user = new User([
                'name'=>"raul$i",
                'email'=>"raul$i@gmail.com",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
                'nickname'=>"theraulitoOMG$i"]);
            $user->dailypoint()->associate(Dailypoint::all()->random()); 
            $user->save();
        }
    }
}
