<?php
use fiercescouts\Character;
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
    return [
        'name' => $faker->word(),
        'victory_points' => $faker->randomDigit(),
        'user_id' => 1,
    ];
});