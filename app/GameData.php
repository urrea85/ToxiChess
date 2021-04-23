<?php

#I'm sorry :(

namespace App;

class GameData{

    public $chess = null;
    public $started = false;
    public $remainingTime = 0.0;
    public $votes = [];
    public $turnStartTime = 0.0;

    static $instance = null;

    public static function getInstance(){
        if (self::$instance === null){
            $instance = new GameData();
        }
        return $instance;
    }
}