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
		$opponent = Character::all()->except($id)->random(1)->where('level', $level);
		
    	//$character = Character::all()->where('user_id', Auth::id())->first()->get();
    	//$opponent = Character::all()->where('level', 1)->first()->get();
        $characterID = $id;
        $opponentID = 8;

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

        $characterHP = $character->hp;
        $characterPA = $character->p_attack;

        echo($opponentHP);

    	while ($opponentHP > 1) {
    		$opponentHP -= $characterPA;
            echo($opponentHP);

            if ($characterHP <= 0 || $opponentHP <= 0) {
                
            }
    	}
    }
}
