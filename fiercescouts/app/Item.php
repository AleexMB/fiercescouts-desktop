<?php

namespace fiercescouts;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ["name", "rarity", "hp", "exp", "gold", "hp", "p_attack", "m_attack", "p_defence", "m_defence", "speed", "itemlv"];

    public function characters(){
    	$this->hasmany('fiercescouts\Item');
    }
}