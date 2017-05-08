<?php

namespace fiercescouts;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ["name", "unlocks_at", "class",];
}