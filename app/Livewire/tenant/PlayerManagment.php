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

#[Layout('layouts.tenant_dashboard.app')]
class PlayerManagment extends Component
{
    public $screen;

    protected $queryString = [
        'screen',
    ];

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

    #[Rule('nullable|string|max:255')]
    public $postion;

    #[Rule('nullable|array|max:255')]
    public $selected_skills = [];

    #[Computed]
    public function age()
    {
        if ($this->birth_date) {
            return Carbon::parse($this->birth_date)->age;
        }

        return null;
    }

    public function switchScreen($screen)
    {
        $this->screen = $screen;
    }

    public function toggleSkill($skillId)
    {
        if (in_array($skillId, $this->selected_skills)) {
            $this->selected_skills = array_diff($this->selected_skills, [$skillId]);
        } else {
            $this->selected_skills[] = $skillId;
        }
        // Ensure array keys are reset for JSON consistency
        $this->selected_skills = array_values($this->selected_skills);
    }

    public function save()
    {
        dd($this->all());
    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {

        return view('livewire.tenant.player.player-managment', [
            'players' => Player::all(),
            'positions' => Position::all(),
            'skills' => Skill::all(),
        ]);
    }
}
