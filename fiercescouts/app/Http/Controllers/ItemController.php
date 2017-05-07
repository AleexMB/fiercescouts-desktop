<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use fiercescouts\Item;
use Auth;

class ItemController extends Controller
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
		//$items = Item::all()->where('character_id')belongsTo(Auth::Id());
		$items = Item::all();
        return view("items.index")->with('items', $items);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view("items.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$chestsToOpen = DB::table('characters')->where('user_id', Auth::id())->value('chests');
			if ($chestsToOpen == 0){
				$item = new Item;
				$item->rarity = GameManager::assignRarity();
				if ($item->rarity == "legendary") {
					$item->name = NameGenerator::legendaryNameGenerator();
				} else {
					$item->name = NameGenerator::commonNameGenerator();
				}
				
				$item->character_id = DB::table('characters')->where('user_id', Auth::id())->value('id');

				$item->save();
				return redirect('items');
			} else {
				return redirect('home');
			}
		// $character = new Character;
		// $character->name = $request->input('name');
  //       $character->class = $request->input('class');
  //       $character->gender = $request->input('gender');
  //       $character->exp = 0;
  //       $character->gold = 0;
  //       $character->user_id = Auth::id();
  //       $character->save();

  //       return redirect('characters');
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
		$item = Item::find($id);
		$item->delete();
		return redirect('items');
	}
}
