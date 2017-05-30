<?php

namespace fiercescouts\Http\Controllers\v1;

use Illuminate\Http\Request;
use fiercescouts\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Validator;

use fiercescouts\Services\v1\CharacterService;

class CharacterController extends Controller
{
	protected $characters;

	public function __construct(CharacterService $service) {
		$this->characters = $service;

        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call service
        $parameters = request()->input();

    	$data = $this->characters->getCharacters($parameters);
        //return data
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $characterId = $request->input('id');
        $this->characters->validate($request->all());

        try {
            $character = $this->characters->createCharacter($request);
            return response()->json($character, 201);
        } catch (Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //call service
        $data = $this->characters->getCharacter($name);
        //return data
        return response()->json($data);
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
    public function update(Request $request, $name)
    {
        //$this->characters->validate($request->all());

        try {
            $character = $this->characters->updateCharacter($request, $name);
            return response()->json($character, 200);
        } catch (ModelNotFoundException $ex){
            throw $ex;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        try {
            $character = $this->characters->deleteCharacter($name);
            return response()->make('', 204);
        } catch (ModelNotFoundException $ex){
            throw $ex;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
