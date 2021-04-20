<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailypoint extends Model
{
    public function dailypoints(){
        return $this->hasMany('App\User');
    }
}