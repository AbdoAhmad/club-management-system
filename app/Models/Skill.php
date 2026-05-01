<?php

namespace App\Models;

use Database\Factories\SkillFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Skill extends Model implements HasMedia
{
    /** @use HasFactory<SkillFactory> */
    use HasFactory;

    use HasTranslations;

    use InteractsWithMedia;

    protected $fillable = [
        'name',
    ];

    public $translatable = ['name'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_skill')->withPivot('value');
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('skills')
            ->singleFile();   
    }
}
