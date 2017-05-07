<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;

class NameGenerator extends Controller
{
    public static function commonNameGenerator(){
    	$finalName = "";
		$randOne = rand(1, 9);
		$randTwo = rand(1, 12);

		$listOne = ["Dagger", "Sword", "Staff", "Scythe", "Blade", "Claw", "Bow", "Longsword", "Axe"];

		$listTwo = [" of agility", " of pain", " of the fallen", " of death", " of the protector", " of darkness", " of might", " of cruelty", " of the warrior", " of holiness", " of the guardian", " of spirit"];

		$finalName = $listOne[$randOne - 1] . $listTwo[$randTwo - 1];
		return $finalName;
    }

    public static function legendaryNameGenerator(){
    	$finalName = "";
		$randOne = rand(1, 9);
		$randTwo = rand(1, 9);

		$listOne = ["Heartseeker", "Deathraze", "Requiem", "Tranquillity", "Echo", "Faithkeeper", "Bloodquench", "Venomshank", "Nirvana"];

		$listTwo = [", bond of the void", ", blade of the twilight", ", eye of the storm", ", reaper of souls", ", blade of necromancy", ", destroyer of giants", ", forged in blood", ", blade of misery", ", hellish spellblade"];

		$finalName = $listOne[$randOne - 1] . $listTwo[$randTwo - 1];
		return $finalName;
    }
}

