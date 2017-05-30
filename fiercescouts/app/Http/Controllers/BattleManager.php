<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
use Redirect;
use Auth;
use DB;

class BattleManager extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function battleStart() {
    	$character = DB::table('characters')->where('user_id', Auth::id())->take(1)->get();
    	$level = DB::table('characters')->where('user_id', Auth::id())->value('level');
    	$id = DB::table('characters')->where('user_id', Auth::id())->value('id');
		//$opponent = DB::table('characters')->orderBy()->where('level', $level)->take(1)->get();


    	//guardare condizione nel where
        $opponent = Character::inRandomOrder()->where('user_id', '!=', Auth::id())->where('level', $level)->firstOrFail();


        $characterID = $id;
        $opponentID = $opponent['attributes']['id'];
        //dd($opponent['attributes']['id']);

        BattleManager::battleResolve($characterID, $opponentID);
        //return Redirect::to('/home');

    	// return view("battles.battle")
	    // 	->with('character', $character)
	    // 	->with('opponent', $opponent);
    }

    public function battleResolve($characterID, $opponentID) {
        $turn = 0;

        $character = Character::where('id', $characterID)->firstOrFail();
        $opponent = Character::where('id', $opponentID)->firstOrFail();

        $opponentHP = $opponent->hp;
        $opponentPA = $opponent->p_attack;
        $opponentMA = $opponent->m_attack;
        $opponentPD = $opponent->p_defence;
        $opponentMD = $opponent->m_defence;

        $characterHP = $character->hp;
        $characterPA = $character->p_attack;
        $characterMA = $character->m_attack;
        $characterPD = $character->p_defence;
        $characterMD = $character->m_defence;

    	while (($characterHP > 0) && ($opponentHP > 0)) {
    		$opponentHP -= ($characterPA + $characterMA) - ($opponentPD + $opponentMD);
            $characterHP -= ($opponentPA + $opponentMA) - ($characterPD + $characterMD);

            if ($opponentHP <= 0) {
                $character->victory_points += (1 + ($opponent->level - $character->level)) * 2;
                $character->save();
                echo("I won");
            } elseif ($characterHP <= 0) {
                echo("I've lost");
            }
    	}
    }
}
