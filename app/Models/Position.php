<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\Attributes\Translatable;
use Spatie\Translatable\HasTranslations;
class Position extends Model
{
    /** @use HasFactory<\Database\Factories\PositionFactory> */
    use HasFactory;
        use HasTranslations;
        protected $fillable = [
        'name',
    ];
    public $translatable = ['name'];
    
    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_position')->withPivot('is_primary');
    }

}
