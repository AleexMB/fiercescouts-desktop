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
}
