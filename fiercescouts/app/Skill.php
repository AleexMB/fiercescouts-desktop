<?php

namespace fiercescouts;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ["name", "description", "unlocks_at", "class",];
}