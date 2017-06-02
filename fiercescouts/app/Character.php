<?php

namespace fiercescouts;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	protected $fillable = ["name", "gender", "level", "class", "exp", "gold", "hp", "p_attack", "m_attack", "p_defence", "m_defence", "speed", "weapon_right", "weapon_left", "skill", "victory_points", "chests", "chests_limit",];
	
    public function users(){
    	$this->hasmany('fiercescouts\Character');
    }

    public function items(){
        $this->belongsto('fiercescouts\Character');
    }
}