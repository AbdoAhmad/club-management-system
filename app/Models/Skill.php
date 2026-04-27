<?php

namespace App\Models;

use Database\Factories\SkillFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Skill extends Model
{
    /** @use HasFactory<SkillFactory> */
    use HasFactory;

    use HasTranslations;

    protected $fillable = [
        'name',
    ];

    public $translatable = ['name'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_skill')->withPivot('skill_level', 'skill_level_type');
    }
}
