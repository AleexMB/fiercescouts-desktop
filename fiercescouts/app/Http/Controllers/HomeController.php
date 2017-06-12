<?php

namespace fiercescouts\Http\Controllers;

use Illuminate\Http\Request;
use fiercescouts\Character;
use fiercescouts\User;
use Auth;
use URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkDevice');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $character = Character::all()->where('user_id', Auth::id());
        if ($character) {
            $character = Character::all()->where('user_id', Auth::id())->first();
            return redirect(URL::to('characters/' . $character->id));
        }

    //return 'test';
       //return view('home');
    }
}
