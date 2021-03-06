<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
use fiercescouts\Item;
use Illuminate\Support\Facades\Validator;
use Auth;

class CharacterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('checkDevice');

		Validator::extend('without_spaces', function($attr, $value){
    		return preg_match('/^\S*$/u', $value);
		});
	}

	public function index()
	{
		$characters = Character::all()->where('user_id', Auth::id());
        return view("characters.index")->with('characters', $characters);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$checkHowMany = Character::all()->where('user_id', Auth::id())->count();
		if ($checkHowMany >= 1) {
			return view("home");
		} else {
			return view("characters.create", compact("characters"));
		}
	}

	// protected function validator(array $data) {
	// 	return Validator::make($data, [
	//         'name' => 'required|string|required|without_spaces|max:12',
	//     ]);
	// }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{	
		if (!$request->input('name') || !$request->input('class') || !$request->input('gender')) {
			return redirect('home');
		}

		$validator = Validator::make($request->all(), [
            'name' => 'required|string|required|without_spaces|max:12',
        ]);

        if ($validator->fails()) {
            return redirect('home');
        }

		//creo il personaggio
		$character = new Character;
		$character->name = $request->input('name');
        $character->class = $request->input('class');
        $character->level = 1;

        //richiamo metodo per generare le stat iniziali e le assegno
        $classStats = GameManager::assignClass($request->input('class'));
        $character->hp = $classStats[0];
        $character->p_attack = $classStats[1];
        $character->m_attack = $classStats[2];
        $character->p_defence = $classStats[3];
        $character->m_defence = $classStats[4];

        switch ($request->input('class')) {
        	case "warrior":
        		$character->skill = 1;
        		break;
        	case "mage":
        		$character->skill = 2;
        		break;
        	case "assassin":
        		$character->skill = 3;
        		break;
        	case "demon":
        		$character->skill = 4;
        		break;
        	case "monk":
        		$character->skill = 5;
        		break;
        }

        $character->gender = $request->input('gender');
        $character->exp = 0;
        $character->gold = 0;
        $character->victory_points = 0;
        $character->chests = 0;
        $character->chests_limit = 5;
        $character->battle_won = 0;
        $character->battle_lost = 0;
        $character->user_id = Auth::id();
        $character->save();

        return redirect('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$character = Character::find($id);

		if (!$character) {
			return view('errors.404');
		}

		$itemLID = $character->weapon_left;
		$itemRID = $character->weapon_right;

		$itemR = Item::find($itemRID);
		$itemL = Item::find($itemLID);

        // show the view and pass the nerd to it
		if ($itemR && $itemL) {
			return view('characters.show')
            ->with('character', $character)
            ->with('itemR', $itemR)
            ->with('itemL', $itemL);
		} else if ($itemR && !$itemL) {
			return view('characters.show')
            ->with('character', $character)
            ->with('itemR', $itemR)
            ->with('itemL', null);
		} else if (!$itemR && $itemL) {
			return view('characters.show')
            ->with('character', $character)
            ->with('itemR', null)
            ->with('itemL', $itemL);
		} else {
	        return view('characters.show')
	            ->with('character', $character)
	            ->with('itemR', null)
	            ->with('itemL', null);
	    }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$character = Character::find($id);

        // show the edit form and pass the nerd
        return view('characters.edit')
            ->with('character', $character);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// store
        $character = Character::find($id);

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

        	$character->save();
        }

        // redirect
        return redirect('home');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		// DELETE
		$character = Character::find($id);
		$character->delete();
		return redirect('characters');
	}
}
