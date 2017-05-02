<?php

namespace fiercescouts;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	protected $fillable = ["name", "gender", "class", "exp", "gold", "hp", "p_attack", "m_attack", "p_defense", "m_defense", "speed", "weapon_right", "weapon_left", "victory_points"];
	
    public function users(){
    	$this->hasmany('fiercescouts\Character');
    }
}