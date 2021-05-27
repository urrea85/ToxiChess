<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Dailypoint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password'=>Hash::make('1234'),
                'role'=> 'client',
                'nickname'=>'xXpepeXx']);     
        $user->save();

        $user = new User([
            'name'=>'juan',
            'email'=>'b@b.com',
            'password'=>Hash::make('1234'),
            'role'=> 'client',
            'nickname'=>'juan13']);
        $user->save();

        $user = new User([
            'name'=>'administrador',
            'email'=>'admin@admin',
            'password'=> Hash::make('admin'),
            'role'=> 'admin',
            'nickname'=>'admin']);
        $user->save();

        $user = new User([
            'name'=>'Joselito',
            'email'=>'Joseli@asd.com',
            'password'=>Hash::make('1234'),
            'role'=> 'client',
            'nickname'=>'Er_JosEh']);
        $user->save();
        
        $user = new User([
            'name'=>'raul',
            'email'=>'raul123@gmail.com',
            'password'=>Hash::make('1234'),
            'role'=> 'client',
            'nickname'=>'theraulitoOMG']);
        $user->save();

        for($i = 0; $i<100; $i++){
            $user = new User([
                'name'=>"raul$i",
                'email'=>"raul$i@gmail.com",
                'password'=>Hash::make('1234'),
                'role'=> 'client',
                'nickname'=>"theraulitoOMG$i"]);
            $user->save();
        }
    }
}
