<?php

namespace fiercescouts\Http\Controllers\v1;

use Illuminate\Http\Request;
use fiercescouts\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Validator;

use fiercescouts\Services\v1\UserService;

class UserController extends Controller
{
	protected $users;

    public function __construct(UserService $service) {
		$this->users = $service;
	}

    public function logIn(Request $request)
    {
        //call service
        $user = $this->users->logUser($request);
        //return data
        return response()->json($user, 200);
        
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

    	$data = $this->users->getUsers($parameters);
        //return data
        return response()->json($data);
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
        $data = $this->users->getUser($name);
        //return data
        return response()->json($data);
    }
}
