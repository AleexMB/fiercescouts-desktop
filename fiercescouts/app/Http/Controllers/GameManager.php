<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
use fiercescouts\Item;
use Auth;

class GameManager extends Controller
{
	//METODO PER ASSEGNARE STATISTICHE GENERATE RANDOM ALLA CREAZIONE DEL PERSONAGGIO
    public static function assignClass($class) {
    	$hp;
		$p_attack;
		$m_attack;
		$p_defence;
		$m_defence;
		$stats;

		switch ($class) {
			case "warrior":
				$hp = rand(140, 166);
				$p_attack = rand(10, 14);
				$m_attack = rand(2, 6);
				$p_defence = rand(5, 8);
				$m_defence = rand(6, 10);
				break;
			case "mage":
				$hp = rand(96, 109);
				$p_attack = rand(8, 10);
				$m_attack = rand(10, 14);
				$p_defence = rand(3, 7);
				$m_defence = rand(10, 14);
				break;
			case "assassin":
				$hp = rand(84, 95);
				$p_attack = rand(17, 21);
				$m_attack = rand(2, 6);
				$p_defence = rand(2, 6);
				$m_defence = rand(4, 9);
				break;
            case "demon":
                $hp = rand(130, 133);
                $p_attack = rand(10, 14);
                $m_attack = rand(10, 14);
                $p_defence = rand(6, 8);
                $m_defence = rand(2, 6);
                break;
            case "monk":
                $hp = rand(82, 100);
                $p_attack = rand(8, 12);
                $m_attack = rand(11, 15);
                $p_defence = rand(5, 7);
                $m_defence = rand(4, 8);
                break;
		}

		$stats = array (
			$hp,
			$p_attack,
			$m_attack,
			$p_defence,
			$m_defence,
		);

		return $stats;
    }

    //METODO PER ASSEGNARE STATISTICHE GENERATE RANDOM AL LEVEL UP
    public static function assignLevelUpStats($level) {
    	$hp = (rand(7, 10) + rand($level - 1, $level + 1));
		$p_attack = (rand(1, 4) + rand($level - 1, $level + 1));
		$m_attack = (rand(1, 3) + rand($level - 1, $level + 1));
		$p_defence = (rand(1, 2) + rand($level - 1, $level + 1));
		$m_defence = (rand(1, 2) + rand($level - 1, $level + 1));
        $leveled = true;

		$stats = array (
			$hp,
			$p_attack,
			$m_attack,
			$p_defence,
			$m_defence,
            $leveled,
		);

		return $stats;
    }

    //METODO PER ASSEGNARE LE STAT AD ITEM
    public static function assignItemStats($level, $rarity) {
        if ($rarity == "common") {
            $hp = (rand(5, 8) + rand($level, $level + 5));
            $p_attack = (rand(2, 3) + rand($level, $level + 3));
            $m_attack = (rand(2, 3) + rand($level, $level + 3));
            $p_defence = (rand(1, 2) + rand($level, $level + 2));
            $m_defence = (rand(1, 2) + rand($level, $level + 2));
        } else if ($rarity == "rare") {
            $hp = (rand(8, 16) + rand($level, $level + 6));
            $p_attack = (rand(3, 6) + rand($level, $level + 8));
            $m_attack = (rand(3, 6) + rand($level, $level + 8));
            $p_defence = (rand(2, 3) + rand($level, $level + 3));
            $m_defence = (rand(2, 3) + rand($level, $level + 3));
        } else {
            $hp = (rand(20, 26) + rand($level, $level + 16));
            $p_attack = (rand(6, 10) + rand($level, $level + 16));
            $m_attack = (rand(6, 10) + rand($level, $level + 16));
            $p_defence = (rand(4, 6) + rand($level, $level + 8));
            $m_defence = (rand(4, 6) + rand($level, $level + 8));
        }

        $itemLevel = ($hp + $p_attack + $m_attack + $p_defence + $m_defence) / 5;

        $stats = array (
            $hp,
            $p_attack,
            $m_attack,
            $p_defence,
            $m_defence,
            $itemLevel,
        );

        return $stats;
    }

    //METODO PER ASSEGNARE LA RARITÁ A UN ITEM
    public static function assignRarity() {
    	$rarity = "";
    	$rarityRoll = rand(1, 150);

    	if ($rarityRoll > 0 && $rarityRoll < 81) {
    		$rarity = "common";
    	} else if ($rarityRoll >= 100 && $rarityRoll <= 110) {
    		$rarity = "rare";
    	} else if ($rarityRoll >= 136 && $rarityRoll <= 143) {
    		$rarity = "legendary";
    	} else {
    		$rarity = "common";
    	}
    	return $rarity;
    }

    //METODO PER LEVEL UP
    public static function levelUp($level, $exp) {
        if ($level <= 5) {
        	switch ($level) {
        		case 1:
        			if ($exp >= 20) {
        				$updatedStats = GameManager::assignLevelUpStats($level);
        				return $updatedStats;
        			}
        			break;
        		case 2:
        			if ($exp >= 35) {
        				$updatedStats = GameManager::assignLevelUpStats($level);
        				return $updatedStats;
        			}
        			break;
        		case 3:
        			if ($exp >= 55) {
        				$updatedStats = GameManager::assignLevelUpStats($level);
        				return $updatedStats;
        			}
        			break;
        		case 4:
        			if ($exp >= 90) {
        				$updatedStats = GameManager::assignLevelUpStats($level);
        				return $updatedStats;
        			}
        			break;
        	}
        }
    }

    //METODI PER EQUIPPARE ITEM NEGLI SLOT
    public function equipItemR($id){
        $character = Character::all()->where('user_id', Auth::id())->first();

        if ($character->weapon_left != $id) {
            $character->weapon_right = $id;
            $character->save();

            return redirect("home");
        } else {
            $character->weapon_left = null;
            $character->weapon_right = $id;
            $character->save();

            return redirect("home");
        }
    }

    public function equipItemL($id){
        $character = Character::all()->where('user_id', Auth::id())->first();

        if ($character->weapon_right != $id) {
            $character->weapon_left = $id;
            $character->save();

            return redirect("home");
        } else {
            $character->weapon_right = null;
            $character->weapon_left = $id;
            $character->save();

            return redirect("home");
        }
    }
}
