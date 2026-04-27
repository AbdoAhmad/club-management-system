<?php

namespace App\Models;

use Database\Factories\PlayerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\Attributes\Translatable;
use Spatie\Translatable\HasTranslations;


class Player extends Model
{
    /** @use HasFactory<PlayerFactory> */
    use HasFactory;

    use HasTranslations;
    protected $fillable = [
        'name',
        'age',
        'jersey_number',
        'height',
        'weight',
    ];
    public $translatable = ['name'];


    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'player_skill')->withPivot('skill_level', 'skill_level_type');
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'player_position')->withPivot('position_level');
    }

}
