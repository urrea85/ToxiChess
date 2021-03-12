<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user->save();

        $user = new User([
            'name'=>'juan',
            'email'=>'b@b.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'juan13']);
        $user->save();

        $user = new User([
            'name'=>'moi',
            'email'=>'moi@b.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'byMoiXx']);
        $user->save();

        $user = new User([
            'name'=>'Joselito',
            'email'=>'Joseli@asd.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'Er_JosEh']);
        $user->save();
        
        $user = new User([
            'name'=>'raul',
            'email'=>'raul123@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi',
            'nickname'=>'theraulitoOMG']);
        $user->save();
    }
}
