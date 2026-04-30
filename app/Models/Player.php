<?php

namespace App\Models;

use Database\Factories\PlayerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\Attributes\Translatable;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Player extends Model implements HasMedia
{
    /** @use HasFactory<PlayerFactory> */
    use HasFactory;

    use HasTranslations;
    
    use InteractsWithMedia;

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
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('player_image')
            ->singleFile();   
    }

}
