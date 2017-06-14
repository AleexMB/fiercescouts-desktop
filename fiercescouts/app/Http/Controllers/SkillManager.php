<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
use fiercescouts\Skill;

class SkillManager extends Controller
{
    public static function spellBook($spell, $battleStats) {

    	switch ($spell) {
    		//WARRIOR SKILLS
    		case "Hard strike":
    			$battleStats['oHP'] -= ($battleStats['cPA']) - ($battleStats['oPD'] / 2);
    			break;
    		case "Bash":
                $battleStats['oHP'] -= $battleStats['cPD'];
    			break;
    		//MAGE SKILLS
    		case "Magic missle":
    			$battleStats['oHP'] -= ($battleStats['cMA'] / 2);
    			break;
    		//ASSASSIN SKILLS
    		case "Slit":
    			$battleStats['oHP'] -= ($battleStats['cPA'] / 2);
    			break;
    		//DEMON SKILLS
    		case "Bite":
    			$battleStats['oHP'] -= ($battleStats['cPA'] / 2);
    			break;
    		//MONK SKILLS
    		case "Smite":
    			$battleStats['oPD'] -= 1;
    			break;
            //EXTRA SKILLS
            case "Apocalypse":
                $battleStats['oPD'] -= 1;
                break;
    	}

    	return $battleStats;
    }
}