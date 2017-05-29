<?php

namespace fiercescouts\Services\v1;

use fiercescouts\Character;
use fiercescouts\User;
use Validator;

class UserService {

	// protected $supportedIncludes = [
	// ];

	public function getUsers($parameters) {
		if (empty($parameters)) {
			return $this->filterUsers(User::all());
		}

	// 	$withKeys = [];

	// 	if (isset($parameters['include'])) {
	// 		$includeParameters = explode(',', $parameters['include']);
	// 		$includes = array_intersect($this->$supportedIncludes, $includeParameters);
	// 		$withKeys = array_keys($includes);
	// 	}

	// 	return $this->filterUsers(User::with($withKeys)->get(), $withKeys);
	//  }

	// protected $rules = [
	// 	// 'id' => 'required',
	// 	// 'name' => 'required',
	// 	// 'exp' => 'required',
	// ];

	// public function validate($user) {
	// 	$validator = Validator::make($user, $this->rules);

	// 	$validator->validate();
	}

	public function getUser($name) {
		return $this->filterUsers(User::where('name', $name)->get());
	}

	protected function filterUsers($users, $keys = []) {
		$data = [];

		foreach ($users as $user) {
			$entry = [
				'id' => $user->id,
				'name' => $user->name,

				// creazione url
				//'href' => route('characters.show', ['id' => $character->name]),
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