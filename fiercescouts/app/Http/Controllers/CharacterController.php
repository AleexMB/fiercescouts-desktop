<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
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
		return view("characters.create", compact("characters"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//creo il personaggio
		$character = new Character;
		$character->name = $request->input('name');
        $character->class = $request->input('class');
        //richiamo metodo per generare le stat iniziali e le assegno
        $classStats = GameManager::assignClass($request->input('class'));
        $character->hp = $classStats[0];
        $character->p_attack = $classStats[1];
        $character->m_attack = $classStats[2];
        $character->p_defence = $classStats[3];
        $character->m_defence = $classStats[4];
        $character->gender = $request->input('gender');
        $character->exp = 0;
        $character->gold = 0;
        $character->victory_points = 0;
        $character->chests = 0;
        $character->chests_limit = 5;
        $character->user_id = Auth::id();
        $character->save();

        return redirect('characters');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
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
		//
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
