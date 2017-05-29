<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// $api = app('Dingo\Api\Routing\Router');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/v1/characters', v1\CharacterController::class);
Route::resource('/v1/users', v1\UserController::class);

// api/v1/characters

// $api->version('v1', [], function ($api) {

//     $api->get('characters/{id}', 'App\Http\Controllers\Api\CharacterController@show');

// });