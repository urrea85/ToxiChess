<?php

namespace App\Http\Controllers;

use App\Dailypoint;
use App\Events\MakeMove;
use Illuminate\Http\Request;
use PChess\Chess\Chess;
use Illuminate\Support\Facades\Log;
use App\State;
use App\Vote;
use App\Game;
use App\ServiceLayer\ChessServices;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChessController extends Controller
{
    const turnTime = 15.0;
    public $state = null;
    public $chess = null;

    public function __construct(){
        $this->state = State::latest()->first();
        if ($this->state->fen != ""){
            $this->chess = new Chess($this->state->fen);
        }
        else{
            $this->chess = new Chess();
        }
        
    }

    public function index(){
        $this->updateChess();
        //return view('home',['chess' => $this->state->gameStatus()]);
        return view('home',['time'=>$this->state->remainingTime, 'fen'=>$this->chess->fen()]);
        
    }

    public function updateChess(){
        if (!$this->state->started){
            $this->state->started = true;
            $this->state->remainingTime = self::turnTime;
            $this->state->turnStartTime = microtime(true);
            $this->state->gameStartTime = now();
            $this->state->turnCount = 0;
            $this->chess = new Chess();
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
        if ($this->state->votes()->where('turn','=',$this->state->turnCount)->count() !=0 ){
            $move = $this->state->votes()->where('turn','=',$this->state->turnCount)->inRandomOrder()->first()->move;
            $smove = explode("-",$move);
            $this->chess->move(['from' => $smove[0], 'to' => $smove[1]]);
            $repeat = false;
            $this->state->turnCount += 1;
        }
        $this->state->remainingTime = self::turnTime;
        $this->state->turnStartTime = microtime(true);
        if ($this->chess->gameOver()){
            $end = true;
            $this->state->started = false;
            $this->state->fen = "";

            $game = new Game();
            $game->moves = $this->getMoves();
            $game->result = $this->getResult();
            $game->start = $this->state->gameStartTime;
            $game->end = now();
            $game->save();
            $result = $game->result;
            
            ChessServices::finishGame($result);
        }
        broadcast(new MakeMove($move,$repeat,$end,$result,self::turnTime));
    }

    public function saveGame(){
        $this->state->fen = $this->chess->fen();
        $this->state->save();
    }

    public function vote(Request $request){
        if (!Auth::check()){
            Log::debug("wat");
            return;
        }
        $vote = new Vote();
        $vote->move = $request->move;
        $vote->user_id = Auth()->user()->id;
        $vote->side = $request->side;
        $vote->turn = $this->state->turnCount;
        Vote::where('user_id', '=', $vote->user_id)->where('turn', '=', $vote->turn)->delete();
        $this->state->votes()->save($vote);
    }

    public function getMoves(){
        $result = "";
        foreach ($this->chess->getHistory()->getEntries() as $entry) {
            $result = $result . $entry->move->from . "-" . $entry->move->to . ",";
        }
        return substr($result,0,-1);
    }

    public function getResult(){
        if ($this->chess->inDraw()){
            return "draw";
        }
        if ($this->chess->inCheckmate()){
            if ($this->chess->turn == "w"){
                return "black";
            }
            return "white";
        }
        Log::debug("Shouldn't happen");
        return "draw";
    }
}
