<?php

namespace App\Http\Controllers;

use App\Events\MakeMove;
use Illuminate\Http\Request;
use PChess\Chess\Chess;
use Illuminate\Support\Facades\Log;

class ChessController extends Controller
{
    const turnTime = 15.0;
    public $chess = null;
    public $started = false;
    public $remainingTime = 0.0;
    public $votes = [];
    public $turnStartTime = 0.0;

    public function index(){
        $this->updateChess();
        Log::debug("hello?");
        //return view('home',['chess' => $this->gameStatus()]);
        return view('home',['time'=>$this->remainingTime, 'fen'=>$this->chess->fen()]);
        
    }

    public function updateChess(){
        if (!$this->started){
            $this->started = true;
            $this->chess = new Chess();
            //TODO: delete
            $this->chess->move('e4');
            $this->remainingTime = self::turnTime;
            $this->turnStartTime = microtime(true);
        }
        else{
            $this->remainingTime = self::turnTime - (microtime(true) - $this->turnStartTime);
            if ($this->remainingTime<=0.0){
                $this->makeMove();
            }
        }
    }

    public function gameStatus(){
        return ['time'=>$this->remainingTime, 'fen'=>$this->chess->fen()];
    }
    
    public function makeMove(){
        $repeat = true;
        $end = false;
        $result = "";
        $move = "";
        if (!empty($this->votes)){
            $move = $this->votes[array_rand($this->votes)];
            $this->chess->move($move);
            $repeat = false;
        }
        $this->remainingTime = self::turnTime;
        $this->turnStartTime = microtime(true);
        if ($this->chess->gameOver()){
            $end = true;
            $this->started = false;
        }
        broadcast(new MakeMove($move,$repeat,$end,$result));
    }
}
