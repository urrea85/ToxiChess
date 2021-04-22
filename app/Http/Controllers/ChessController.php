<?php

namespace App\Http\Controllers;

use App\Events\MakeMove;
use Illuminate\Http\Request;
use PChess\Chess\Chess;
use Illuminate\Support\Facades\Log;
use App\GameData;

class ChessController extends Controller
{
    public static $test = 1;
    const turnTime = 15.0;
    public $data = null;

    public function __construct(){
        self::$test += 1;
        Log::debug(self::$test);
        $this->data = GameData::getInstance();
    }

    public function index(){
        $this->updateChess();
        //return view('home',['chess' => $this->data->gameStatus()]);
        return view('home',['time'=>$this->data->remainingTime, 'fen'=>$this->data->chess->fen()]);
        
    }

    public function updateChess(){
        if (!$this->data->started){
            $this->data->started = true;
            $this->data->chess = new Chess();
            //TODO: delete
            Log::debug("started");
            $this->data->chess->move('e4');
            $this->data->remainingTime = self::turnTime;
            $this->data->turnStartTime = microtime(true);
        }
        else{
            $this->data->remainingTime = self::turnTime - (microtime(true) - $this->data->turnStartTime);
            if ($this->data->remainingTime<=0.0){
                $this->makeMove();
            }
        }
    }

    public function gameStatus(){
        return ['time'=>$this->data->remainingTime, 'fen'=>$this->data->chess->fen()];
    }
    
    public function makeMove(){
        $repeat = true;
        $end = false;
        $result = "";
        $move = "";
        if (!empty($this->data->votes)){
            $move = $this->data->votes[array_rand($this->data->votes)];
            $this->data->chess->move($move);
            $repeat = false;
        }
        $this->data->remainingTime = self::turnTime;
        $this->data->turnStartTime = microtime(true);
        if ($this->data->chess->gameOver()){
            $end = true;
            $this->data->started = false;
        }
        broadcast(new MakeMove($move,$repeat,$end,$result));
    }
}
