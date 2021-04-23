<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function votes(){
        return $this->hasMany('App\Vote');
    }
}
