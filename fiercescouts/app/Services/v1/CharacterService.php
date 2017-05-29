<?php

namespace fiercescouts\Services\v1;

use fiercescouts\Http\Controllers\GameManager;
use fiercescouts\Character;
use fiercescouts\User;
use Validator;

class CharacterService {
	protected $supportedIncludes = [
		'exp' => 'exp',
		'hp' => 'hp',
	];

	public function getCharacters($parameters) {
		if (empty($parameters)) {
			return $this->filterCharacters(Character::all());
		}

		$withKeys = [];

		if (isset($parameters['include'])) {
			$includeParameters = explode(',', $parameters['include']);
			$includes = array_intersect($this->$supportedIncludes, $includeParameters);
			$withKeys = array_keys($includes);
		}

		return $this->filterCharacters(Characters::with($withKeys)->get(), $withKeys);
	}

	protected $rules = [
		'id' => 'required',
		'name' => 'required',
		'exp' => 'required',
	];

	public function validate($character) {
		$validator = Validator::make($character, $this->rules);

		$validator->validate();
	}

	public function getCharacter($name) {
		return $this->filterCharacters(Character::where('name', $name)->get());
	}

	public function createCharacter($request) {
		//dd($request->all());
		// $id = $request->input('id');
		// $name = $request->input('name');
		// $userId = $request->input('user_id');

		$character = new Character();
		$character->id = $request->input('id');
		$character->name = $request->input('name');
		$character->user_id = $request->input('user_id');
		$character->exp= $request->input('exp');

		$character->save();

		return $this->filterCharacters([$character]);
	}

	public function updateCharacter($request, $name) {
		$character = Character::where('name', $name)->firstOrFail();

		if ($request->input('exp')){
			$character->exp = $request->input('exp');

			$actualExp = $character->exp;
        	$actualLevel = $character->level;

        	$updatedStats = GameManager::levelUp($actualLevel, $actualExp);

        	if ($updatedStats[5]) {
		        $character->hp += $updatedStats[0];
		        $character->p_attack += $updatedStats[1];
		        $character->m_attack += $updatedStats[2];
		        $character->p_defence += $updatedStats[3];
		        $character->m_defence += $updatedStats[4];
		        $character->exp = 0;
		        $character->level += 1;
        	}
		}

		if ($request->input('chests')){
			$character->chests = $request->input('chests');
		}

		$character->save();

		return $this->filterCharacters([$character]);
	}

	public function deleteCharacter($name) {
		$character = Character::where('name', $name)->firstOrFail();

		$character->delete();
	}

	protected function filterCharacters($characters, $keys = []) {
		$data = [];

		foreach ($characters as $character) {
			$entry = [
				'name' => $character->name,
				'gender' => $character->gender,
				'class' => $character->class,
				'level' => $character->level,
				'exp' => $character->exp,
				'gold' => $character->gold,
				'hp' => $character->hp,
				'p_attack' => $character->p_attack,
				'm_attack' => $character->m_attack,
				'p_defence' => $character->p_defence,
				'm_defence' => $character->m_defence,
				'weapon_right' => $character->weapon_right,
				'weapon_left' => $character->weapon_left,
				'victory_points' => $character->victory_points,
				'chests' => $character->chests,
				'chests_limit' => $character->chests_limit,

				// creazione url
				'href' => route('characters.show', ['id' => $character->name]),
			];

			// if (in_array('exp', $keys)) {
			// 	$entry['exp'] = [
			// 		'exp' = $character->exp,
			// 	];

			// }

			$data[] = $entry;
		}

		return $data;
	}
}