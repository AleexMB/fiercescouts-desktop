<?php
use fiercescouts\Character;
use fiercescouts\User;
use fiercescouts\Http\Controllers\GameManager;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//@var \Illuminate\Database\Eloquent\Factory $factory;


$factory->define(fiercescouts\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(fiercescouts\Character::class, function (Faker\Generator $faker) {
    $classes = ['warrior', 'mage', 'assassin', 'demon', 'monk'];
    $genders = ['M', 'F'];

    $classStats = GameManager::assignClass($classes[rand(0, 4)]);
    $countUsers = User::all()->count();

    return [
        'name' => $faker->userName(),
        'level' => rand(1, 3),
        'class'=> $classes[rand(0,4)],
        'hp' => $classStats[0],
        'p_attack' => $classStats[1],
        'm_attack' => $classStats[2],
        'p_defence' => $classStats[3],
        'm_defence' => $classStats[4],
        'skill' => rand(1, 5),
        'gender' => $genders[rand(0, 1)],
        'exp' => 0,
        'gold' => rand(1, 1000),
        'victory_points' => rand(0, 40),
        'chests' => 0,
        'chests_limit' => 5,
        'user_id' => rand(1, $countUsers),
    ];
});