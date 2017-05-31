<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
use fiercescouts\Skill;
use fiercescouts\Item;
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
        $opponent = Character::inRandomOrder()->where('user_id', '!=', Auth::id())->where('level', $level)->orWhere('level', $level + 1)->orWhere('level', $level - 1)->firstOrFail();


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
        $turn = 1;

        $character = Character::where('id', $characterID)->firstOrFail();
        $opponent = Character::where('id', $opponentID)->firstOrFail();

        $characterHP = $character->hp;
        $characterPA = $character->p_attack;
        $characterMA = $character->m_attack;
        $characterPD = $character->p_defence;
        $characterMD = $character->m_defence;

        $characterWRID = $character->weapon_right;
        $characterWLID = $character->weapon_left;

        if ($characterWRID) {
            $characterWR = Item::where('id', $character->weapon_right)->firstOrFail();

            $characterHP += $characterWR->hp;
            $characterPA += $characterWR->p_attack;
            $characterMA += $characterWR->m_attack;
            $characterPD += $characterWR->p_defence;
            $characterMD += $characterWR->m_defence;
        }

        if ($characterWLID) {
            $characterWL = Item::where('id', $character->weapon_left)->firstOrFail();

            $characterHP += $characterWL->hp;
            $characterPA += $characterWL->p_attack;
            $characterMA += $characterWL->m_attack;
            $characterPD += $characterWL->p_defence;
            $characterMD += $characterWL->m_defence;
        }

        $opponentHP = $opponent->hp;
        $opponentPA = $opponent->p_attack;
        $opponentMA = $opponent->m_attack;
        $opponentPD = $opponent->p_defence;
        $opponentMD = $opponent->m_defence;

        $opponentWRID = $opponent->weapon_right;
        $opponentWLID = $opponent->weapon_left;

        if ($opponentWRID) {
            $opponentWR = Item::where('id', $opponent->weapon_right)->firstOrFail();

            $opponentHP += $opponentWR->hp;
            $opponentPA += $opponentWR->p_attack;
            $opponentMA += $opponentWR->m_attack;
            $opponentPD += $opponentWR->p_defence;
            $opponentMD += $opponentWR->m_defence;
        }

        if ($opponentWLID) {
            $opponentWL = Item::where('id', $opponent->weapon_left)->firstOrFail();

            $opponentHP += $opponentWL->hp;
            $opponentPA += $opponentWL->p_attack;
            $opponentMA += $opponentWL->m_attack;
            $opponentPD += $opponentWL->p_defence;
            $opponentMD += $opponentWL->m_defence;
        }

        $battleRecords = [];

    	while (($characterHP > 0) && ($opponentHP > 0)) {

            if ($turn % 2 != 0) {
        		$opponentHP -= ($characterPA) - ($opponentPD);

                $characterRecord = $character->name . " attacked with weapons and did " . ($characterPA - $opponentPD) . " damage to " . $opponent->name . ". " . $opponent->name . " has " . $opponentHP . " HP left.";

                $characterHP -= ($opponentPA) - ($characterPD);

                $opponentRecord = $opponent->name . " attacked with weapons and did " . ($opponentPA - $characterPD) . " damage to " . $character->name . ". " . $character->name . " has " . $characterHP . " HP left.";
            } else {

                //PERSONAGGIO USA SKILL

                $battleStats = [
                    'cHP' => $characterHP,
                    'cPA' => $characterPA,
                    'cMA' => $characterMA,
                    'cPD' => $characterPD,
                    'cMD' => $characterMD,

                    'oHP' => $opponentHP,
                    'oPA' => $opponentPA,
                    'oMA' => $opponentMA,
                    'oPD' => $opponentPD,
                    'oMD' => $opponentMD,
                ];

                $skillID = $character->skill;

                if ($skillID) {
                    $skill = Skill::where('id', $skillID)->firstOrFail();

                    $newBattleStats = SkillManager::spellBook($skill->name, $battleStats);

                    $characterHP = $newBattleStats['cHP'];
                    $characterPA = $newBattleStats['cPA'];
                    $characterMA = $newBattleStats['cMA'];
                    $characterPD = $newBattleStats['cPD'];
                    $characterMD = $newBattleStats['cMD'];

                    $opponentHP = $newBattleStats['oHP'];
                    $opponentPA = $newBattleStats['oPA'];
                    $opponentMA = $newBattleStats['oMA'];
                    $opponentPD = $newBattleStats['oPD'];
                    $opponentMD = $newBattleStats['oMD'];

                    $characterRecord = $character->name . " used " . $skill->name . ". " . $opponent->name . " has " . $opponentHP . " HP left.";

                } else {
                    $opponentHP -= ($characterPA - $opponentPD);

                    $characterRecord = $character->name . " attacked with weapons and did " . ($characterPA - $opponentPD) . " damage to " . $opponent->name . ". " . $opponent->name . " has " . $opponentHP . " HP left.";
                }

                //AVVERSARIO USA SKILL

                $battleStats = [
                    'cHP' => $opponentHP,
                    'cPA' => $opponentPA,
                    'cMA' => $opponentMA,
                    'cPD' => $opponentPD,
                    'cMD' => $opponentMD,

                    'oHP' => $characterHP,
                    'oPA' => $characterPA,
                    'oMA' => $characterMA,
                    'oPD' => $characterPD,
                    'oMD' => $characterMD,
                ];

                $skillID = $opponent->skill;

                if ($skillID) {
                    $skill = Skill::where('id', $skillID)->firstOrFail();

                    $newBattleStats = SkillManager::spellBook($skill->name, $battleStats);

                    $characterHP = $newBattleStats['oHP'];
                    $characterPA = $newBattleStats['oPA'];
                    $characterMA = $newBattleStats['oMA'];
                    $characterPD = $newBattleStats['oPD'];
                    $characterMD = $newBattleStats['oMD'];

                    $opponentHP = $newBattleStats['cHP'];
                    $opponentPA = $newBattleStats['cPA'];
                    $opponentMA = $newBattleStats['cMA'];
                    $opponentPD = $newBattleStats['cPD'];
                    $opponentMD = $newBattleStats['cMD'];

                    $opponentRecord = $opponent->name . " used " . $skill->name . ". " .  $character->name . " has " . $characterHP . " HP left.";

                } else {
                    $characterHP -= ($opponentPA - $characterPD);

                    $opponentRecord = $opponent->name . " attacked with weapons and did " . ($opponentPA - $characterPD) . " damage to " . $character->name . ". " . $character->name . " has " . $characterHP . " HP left.";
                }
            }

            $turn++;
            $battleRecords[] = $characterRecord;
            $battleRecords[] = $opponentRecord;

            if ($opponentHP <= 0) {
                $character->victory_points += (1 + ($opponent->level - $character->level)) * 2;     
                $character->save();

                if ($opponent->victory_points >= 0) {
                $opponent->victory_points -= (1 + ($character->level - $opponent->level)) * 2;
                    if ($opponent->victory_points < 0){
                        $opponent->victory_points = 0;
                    }
                $opponent->save();
                }

                $characterRecord = $character->name . " WON. " . $opponent->name . " LOST.";
                $opponentRecord = null;
                $battleRecords[] = $characterRecord;

            } elseif ($characterHP <= 0) {
                if ($character->victory_points >= 0) {
                    $character->victory_points -= (1 + ($opponent->level - $character->level)) * 2;
                        if ($character->victory_points < 0){
                            $character->victory_points = 0;
                        }
                    $character->save();
                }

                $opponent->victory_points += (1 + ($character->level - $opponent->level)) * 2;
                $opponent->save();

                $opponentRecord = $opponent->name . " WON. " . $character->name . " LOST.";
                $characterRecord = null;
                $battleRecords[] = $opponentRecord;
            }
    	}
        foreach($battleRecords as $battleRecord) {
            echo $battleRecord, '<br>';
        }
    }
}