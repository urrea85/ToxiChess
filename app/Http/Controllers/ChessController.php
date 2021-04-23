<?php

namespace App\Http\Controllers;

use App\Events\MakeMove;
use Illuminate\Http\Request;
use PChess\Chess\Chess;
use Illuminate\Support\Facades\Log;
use App\State;
use app\Vote;

class ChessController extends Controller
{
    const turnTime = 15.0;
    public $state = null;
    public $chess = null;

    public function __construct(){
        $this->state = State::latest()->first();
        if ($this->state->fen != ""){
            Log::debug("different");
            $this->chess = new Chess($this->state->fen);
        }
        else{
            Log::debug("equal");
            $this->chess = new Chess();
        }
        Log::debug("construct");
        
    }

    public function index(){
        $this->updateChess();
        //return view('home',['chess' => $this->state->gameStatus()]);
        return view('home',['time'=>$this->state->remainingTime, 'fen'=>$this->chess->fen()]);
        
    }

    public function updateChess(){
        if (!$this->state->started){
            $this->state->started = true;
            //TODO: delete
            Log::debug("started");
            $this->chess->move('e4');
            $this->state->remainingTime = self::turnTime;
            $this->state->turnStartTime = microtime(true);
        }
        else{
            $this->state->remainingTime = self::turnTime - (microtime(true) - $this->state->turnStartTime);
            if ($this->state->remainingTime<=0.0){
                $this->makeMove();
            }
        }
        $this->saveGame();
    }

    public function gameStatus(){
        return ['time'=>$this->state->remainingTime, 'fen'=>$this->chess->fen()];
    }
    
    public function makeMove(){
        $repeat = true;
        $end = false;
        $result = "";
        $move = "";
        if ($this->state->votes()->count() !=0 ){
            $move = $this->state->votes()->inRandomOrder()->first();
            $this->chess->move($move);
            $repeat = false;
        }
        $this->state->remainingTime = self::turnTime;
        $this->state->turnStartTime = microtime(true);
        if ($this->chess->gameOver()){
            $end = true;
            $this->state->started = false;
            $this->state->fen = "";
        }
        broadcast(new MakeMove($move,$repeat,$end,$result,self::turnTime));
    }

    public function saveGame(){
        $this->state->fen = $this->chess->fen();
        $this->state->save();
        Log::debug("destruct");
    }
}
