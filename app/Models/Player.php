<?php

namespace App\Models;

use Database\Factories\PlayerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Player extends Model implements HasMedia
{
    /** @use HasFactory<PlayerFactory> */
    use HasFactory;

    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'date_of_birth',
        'joined_at',
        'jersey_number',
        'height',
        'weight',
        'status',
        'description_plain',
    ];

    public $translatable = ['name', 'description', 'description_plain'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'player_skill')->withPivot('value');
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'player_position')->withPivot('is_primary');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('player_image')
            ->singleFile();
    }
}
