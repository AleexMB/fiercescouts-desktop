<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource("characters", "CharacterController");
Route::resource("items", "ItemController");
Route::resource("ladders", "LadderController");

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wrongDevice', function () {
    return view('wrongDevice');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/battle', 'BattleManager@battleStart')->name('battle');

Route::get('/items/equipR/{id}', 'GameManager@equipItemR');
Route::get('/items/equipL/{id}', 'GameManager@equipItemL');