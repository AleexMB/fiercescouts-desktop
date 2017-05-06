<?php

use Illuminate\Database\Seeder;
use fiercescouts\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(fiercescouts\User::class, 5)->create();
    }
}
