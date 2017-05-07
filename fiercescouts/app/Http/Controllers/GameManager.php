<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;

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
				$hp = rand(100, 115);
				$p_attack = rand(8, 11);
				$m_attack = rand(8, 12);
				$p_defence = rand(7, 10);
				$m_defence = rand(7, 10);
				break;
			case "mage":
				$hp = rand(100, 115);
				$p_attack = rand(8, 11);
				$m_attack = rand(8, 12);
				$p_defence = rand(7, 10);
				$m_defence = rand(7, 10);
				break;
			case "assassin":
				$hp = rand(100, 115);
				$p_attack = rand(8, 11);
				$m_attack = rand(8, 12);
				$p_defence = rand(7, 10);
				$m_defence = rand(7, 10);
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
		$p_attack = (rand(1, 3) + rand($level - 1, $level + 1));
		$m_attack = (rand(1, 3) + rand($level - 1, $level + 1));
		$p_defence = (rand(1, 3) + rand($level - 1, $level + 1));
		$m_defence = (rand(1, 3) + rand($level - 1, $level + 1));
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

}
