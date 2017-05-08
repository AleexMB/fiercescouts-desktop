<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('characters')->delete();
        DB::table('skills')->delete();

        $this->call(UsersTableSeeder::class);
        $this->call(CharactersTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
    }
}