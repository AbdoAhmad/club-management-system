<?php

namespace App\Livewire\tenant;

use App\Models\Player;
use App\Models\Position;
use App\Models\Skill;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.tenant_dashboard.app')]
class PlayerManagment extends Component
{
    use WithFileUploads;
    public $screen = 'list';

    protected $queryString = ['screen'];

    // add form data inputs
    #[Rule('nullable|image|mimes:jpeg,png,jpg,gif|max:2048')]
    public $image;

    #[Rule('required|string|max:255')]
    public $name_ar;

    #[Rule('required|string|max:255')]
    public $name_en;

    #[Rule('required|date')]
    public $birth_date;

    #[Rule('required|integer|min:1|max:100')]
    public $jersey_number;

    #[Rule('required|integer|min:0')]
    public $height;

    #[Rule('required|integer|min:0')]
    public $weight;

    #[Rule('nullable|array|max:255')]
    public $selected_position = [

    ];

    #[Rule('nullable|array|max:255')]
    public $selected_skills = [];

    #[Rule('required|string|in:active,banned,injured')]
    public $status;
    public $primary_position_id;

    #[Computed]
    public function age()
    {
        if ($this->birth_date) {
            return Carbon::parse($this->birth_date)->age;
        }

        return null;
    }
    #[computed]
    public function getbirthDate()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->format('Y-m-d') : null;
    }

    public function switchScreen($screen)
    {
        $this->screen = $screen;
    }

    public function save()
    {
        $this->validate();

        $player = Player::create([
            'name' => [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ],
            'age' => $this->age(),
            'jersey_number' => $this->jersey_number,
            'height' => $this->height,
            'weight' => $this->weight,
            'status' => $this->status,
        ]);

        if ($this->image) {
            $player->addMedia($this->image)
                ->toMediaCollection('player_image');
        }

        foreach ($this->selected_skills as $skill) {

            $player->skills()->attach($skill['skill_id'], [
                'skill_level' => $skill['level'],
                'skill_level_type' => $skill['level_type'],
            ]);
        }

        foreach ($this->selected_position as $position) {
            if ($position == $this->primary_position_id) {
                $player->positions()->attach($position, [
                    'position_level' => 'primary',
                ]);
            } else {
                $player->positions()->attach($position, [
                    'position_level' => 'secondary',
                ]);
            }
        }

        session()->flash('message', 'Player registered successfully!');
        $this->clear();
        $this->screen = 'list';

    }

    public function addSkill()
    {
        // initialize the selected_skills array with default values
        $this->selected_skills[] = [
            'skill_id' => '',
            'level' => '',
            'level_type' => '',
        ];

    }

    public function removeSkill($index)
    {

        unset($this->selected_skills[$index]);
        $this->selected_skills = array_values($this->selected_skills);

    }

    public function setLevelType($index, $type)
    {
        if (isset($this->selected_skills[$index])) {
            $this->selected_skills[$index]['level_type'] = $type;
            // Reset level when switching types
            $this->selected_skills[$index]['level'] = $type === 'percentage' ? 0 : 1;
        }
    }

    public function setStarRating($index, $rating)
    {
        if (isset($this->selected_skills[$index]) && $this->selected_skills[$index]['level_type'] === 'stars') {
            $this->selected_skills[$index]['level'] = $rating;
        }
    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {

        return view('livewire.tenant.player.player-managment', [
            'players' => Player::latest()->get(),
            'positions' => Position::all(),
            'skills' => Skill::all(),
        ]);
    }
}
