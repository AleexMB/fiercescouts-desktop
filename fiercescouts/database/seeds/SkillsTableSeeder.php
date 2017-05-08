<?php

use Illuminate\Database\Seeder;
use fiercescouts\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'name' => 'Bash',
            'unlocks_at' => 2,
            'class' => 'warrior',
        ]);

        DB::table('skills')->insert([
            'name' => 'Bash',
            'unlocks_at' => 2,
            'class' => 'warrior',
        ]);
    }
}
