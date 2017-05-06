<?php

use Illuminate\Database\Seeder;
use fiercescouts\Character;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(fiercescouts\Character::class, 5)->create();
    }
}