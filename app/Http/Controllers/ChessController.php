<?php

namespace App\Http\Controllers;

use App\Events\MakeMove;
use Illuminate\Http\Request;
use PChess\Chess\Chess;
use Illuminate\Support\Facades\Log;
use App\State;
use App\Vote;

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
        Log::debug(6);
        return view('home',['time'=>$this->state->remainingTime, 'fen'=>$this->chess->fen()]);
        
    }

    public function updateChess(){
        if (!$this->state->started){
            $this->state->started = true;
            //TODO: delete
            Log::debug("started");
            $this->state->remainingTime = self::turnTime;
            $this->state->turnStartTime = microtime(true);
        }
        else{
            $this->state->remainingTime = self::turnTime - (microtime(true) - $this->state->turnStartTime);
            if ($this->state->remainingTime<=0.0){
                Log::debug(7);
                $this->makeMove();
                Log::debug(8);
            }
        }
        Log::debug(4);
        $this->saveGame();
        Log::debug(5);
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
            Log::debug(1);
            $move = $this->state->votes()->inRandomOrder()->first()->move;
            $smove = explode("-",$move);
            $this->chess->move(['from' => $smove[0], 'to' => $smove[1]]);
            $repeat = false;
            Log::debug(2);
            $this->state->votes()->delete();
            Log::debug(3);
        }
        Log::debug(11);
        $this->state->remainingTime = self::turnTime;
        $this->state->turnStartTime = microtime(true);
        if ($this->chess->gameOver()){
            $end = true;
            $this->state->started = false;
            $this->state->fen = "";
        }
        Log::debug($move);
        Log::debug(10);
        broadcast(new MakeMove($move,$repeat,$end,$result,self::turnTime));
        Log::debug(9);
    }

    public function saveGame(){
        $this->state->fen = $this->chess->fen();
        $this->state->save();
        Log::debug("destruct");
    }

    public function vote(Request $request){
        Log::debug("reaches");
        $vote = new Vote();
        $vote->move = $request->move;
        $this->state->votes()->save($vote);
        Log::debug("reaches?");
    }
}
