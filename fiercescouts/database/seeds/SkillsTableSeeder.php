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
        //STARTER SKILLS

        DB::table('skills')->insert([
            'name' => 'Hard strike',
            'description' => '',
            'unlocks_at' => 1,
            'class' => 'warrior',
        ]);

        DB::table('skills')->insert([
            'name' => 'Magic missle',
            'description' => '',
            'unlocks_at' => 1,
            'class' => 'mage',
        ]);

        DB::table('skills')->insert([
            'name' => 'Slit',
            'description' => '',
            'unlocks_at' => 1,
            'class' => 'assassin',
        ]);

        DB::table('skills')->insert([
            'name' => 'Bite',
            'description' => '',
            'unlocks_at' => 1,
            'class' => 'demon',
        ]);

        DB::table('skills')->insert([
            'name' => 'Smite',
            'description' => '',
            'unlocks_at' => 1,
            'class' => 'monk',
        ]);

        //WARRIOR SKILLS

        DB::table('skills')->insert([
            'name' => 'Bash',
            'description' => '',
            'unlocks_at' => 2,
            'class' => 'warrior',
        ]);

        DB::table('skills')->insert([
            'name' => 'Charge',
            'description' => '',
            'unlocks_at' => 4,
            'class' => 'warrior',
        ]);

        //MAGE SKILLS

        DB::table('skills')->insert([
            'name' => 'Fireball',
            'description' => '',
            'unlocks_at' => 2,
            'class' => 'mage',
        ]);

        DB::table('skills')->insert([
            'name' => 'Arcane Bolt',
            'description' => '',
            'unlocks_at' => 4,
            'class' => 'mage',
        ]);

        //ASSASSIN SKILLS

        DB::table('skills')->insert([
            'name' => 'Open Vein',
            'description' => '',
            'unlocks_at' => 2,
            'class' => 'assassin',
        ]);

        DB::table('skills')->insert([
            'name' => 'Ambush',
            'description' => '',
            'unlocks_at' => 4,
            'class' => 'assassin',
        ]);

        //DEMON SKILLS

        DB::table('skills')->insert([
            'name' => 'Ravage',
            'description' => '',
            'unlocks_at' => 2,
            'class' => 'demon',
        ]);

        DB::table('skills')->insert([
            'name' => 'Flame Breath',
            'description' => '',
            'unlocks_at' => 4,
            'class' => 'demon',
        ]);

        //MONK SKILLS

        DB::table('skills')->insert([
            'name' => 'Dash',
            'description' => '',
            'unlocks_at' => 2,
            'class' => 'monk',
        ]);

        DB::table('skills')->insert([
            'name' => 'Regrowth',
            'description' => '',
            'unlocks_at' => 4,
            'class' => 'monk',
        ]);

        //EXTRA SKILLS

        DB::table('skills')->insert([
            'name' => 'Apocalypse',
            'description' => '',
            'unlocks_at' => 10,
            'class' => 'mage',
        ]);
    }
}
