<?php

class ChooseClass {
	public function assignClass($class) {
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
			// case 2:
			// 	$finalClass = "Mage";
			// 	$characterHealth = rand(75, 90);
			// 	$characterAttack = rand(10, 14);
			// 	$characterDefense = rand(6, 10);
			// 	$characterSpeed = rand(9, 13);
			// 	break;
			// case 3:
			// 	$finalClass = "Assassin";
			// 	$characterHealth = rand(76, 86);
			// 	$characterAttack = rand(14, 17);
			// 	$characterDefense = rand(5, 9);
			// 	$characterSpeed = rand(15, 18);
			// 	break;
			/*case 4:
				$finalClass = "BOH";
				$characterHealth = 100;
				$characterAttack = 5;
				$characterDefense = 10;
				$characterSpeed = 5;
				break;
			case 5:
				$finalClass = "BOH";
				$characterHealth = 100;
				$characterAttack = 5;
				$characterDefense = 10;
				$characterSpeed = 5;
				break;*/
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

//$test = ChooseClass::assignClass(3);
//print_r ($test);
?>