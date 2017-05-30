<?php

namespace fiercescouts\Services\v1;

use Illuminate\Support\Facades\Hash;
use fiercescouts\Character;
use fiercescouts\User;
use Validator;

class UserService {

	public function logUser($request) {
		$email = $request->input('email');
		$password = $request->input('password');

		$user = User::where('email', $email)->first();

		if ($user) {
			$hashedPassword = $user->password;

			if (Hash::check($password, $hashedPassword)){
				$character = Character::where('user_id', $user->id)->firstOrFail();

				return ([
					"api_token" => $user->api_token,
					"character_id" => $character->id,
					"character_name" => $character->name,
					]);
			} else {
				return (["Incorrect password, try again."]);
			}
		} else {
			return (["This email address is not registered."]);
		}
	}

	public function getUsers($parameters) {
		if (empty($parameters)) {
			return $this->filterUsers(User::all());
		}
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