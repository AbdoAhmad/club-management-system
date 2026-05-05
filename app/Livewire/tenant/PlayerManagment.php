<?php

namespace App\Livewire\tenant;

use App\Models\Player;
use App\Models\Position;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mews\Purifier\Facades\Purifier;

#[Layout('layouts.tenant_dashboard.app')]
class PlayerManagment extends Component
{
    use WithFileUploads;

    public $screen = 'list';

    protected $queryString = ['screen'];

    // add form data inputs
    #[Rule('required|string|max:255')]
    public $name_ar;

    #[Rule('required|string|max:255')]
    public $name_en;

    #[Rule('required|string|max:255')]
    public $description_ar;

    #[Rule('required|string|max:255')]
    public $description_en;

    #[Rule('nullable|mimes:jpeg,png,jpg,gif|max:2048')]
    public $image;

    #[Rule('required|date')]
    public $date_of_birth;

    #[Rule('required|date')]
    public $joined_at;

    #[Rule('required|integer|min:1|max:100')]
    public $jersey_number;

    #[Rule('required|string|in:active,banned,injured')]
    public $status;

    #[Rule('required|array|max:255')]
    public $selected_position = [];

    // costom error massege
    public $primary_position_id = '';

    #[Rule('nullable|array|max:255')]
    public $selected_skills = [];

    #[Rule('required|integer|min:0')]
    public $height;

    #[Rule('required|integer|min:0')]
    public $weight;

    public $edit_player;

    // filters
    public $filters = [
        'age_min' => 5,
        'age_max' => 50,
        'joined_date_from' => null,
        'joined_date_to' => null,
        'positions' => [],
        'skills' => [],
        'height_min' => 150,
        'height_max' => 220,
        'weight_min' => 50,
        'weight_max' => 120,
        'status' => ['active' => false, 'banned' => false, 'injured' => false],
        'primary_position_only' => false,
    ];

    public function rules()
    {
        return [
            'selected_skills.*.value' => 'required',
            'selected_skills.*.skill_id' => 'required',
            'selected_skills.*.type' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'selected_skills.*.value.required' => 'The skill level is required.',
            'selected_skills.*.skill_id.required' => 'The skill is required.',
            'selected_skills.*.type.required' => 'The skill type is required.',
        ];
    }

    public function switchScreen($screen)
    {
        $this->screen = $screen;
    }

    public function calculateAge($birth_date)
    {
        if ($birth_date) {
            return Carbon::parse($birth_date)->age;
        }

        return null;
    }

    public function addSkill()
    {
        $this->selected_skills[] = [
            'skill_id' => '',
            'type' => '',
            'value' => '',
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
            $this->selected_skills[$index]['type'] = $type;
            // Reset level when switching types

            $this->selected_skills[$index]['value'] = $type === 'percentage' ? 0 : 1;

        }
    }

    public function setStarRating($index, $rating)
    {
        if (isset($this->selected_skills[$index]) && $this->selected_skills[$index]['type'] === 'stars') {
            // i  want 1 star to be 20 % and 5 stars to be 100%
            //  the rating is between 1 and 5
            $this->selected_skills[$index]['value'] = $rating * 20;
        }
    }

    public function save()
    {
        $this->image = $this->image instanceof UploadedFile ? $this->image : null;
        $this->validate();

        // Clean the descriptions
        $this->description_ar = Purifier::clean($this->description_ar);
        $this->description_en = Purifier::clean($this->description_en);

        if ($this->edit_player) {

            $player = $this->edit_player;
            $player->update([
                'name' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'description' => [
                    'ar' => $this->description_ar,
                    'en' => $this->description_en,
                ],
                'description_plain' => [
                    'ar' => strip_tags(html_entity_decode($this->description_ar)),
                    'en' => strip_tags(html_entity_decode($this->description_en)),
                ],
                'date_of_birth' => Carbon::parse($this->date_of_birth)->format('Y-m-d'),
                'joined_at' => Carbon::parse($this->joined_at)->format('Y-m-d'),
                'jersey_number' => $this->jersey_number,
                'height' => $this->height,
                'weight' => $this->weight,
                'status' => $this->status,
            ]);

            $this->dispatch('notify', [
                'message' => __('Player updated successfully'),
                'type' => 'success',
            ]);

        } else {

            $player = Player::create([
                'name' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'description' => [
                    'ar' => $this->description_ar,
                    'en' => $this->description_en,
                ],
                'description_plain' => [
                    'ar' => strip_tags(html_entity_decode($this->description_ar)),
                    'en' => strip_tags(html_entity_decode($this->description_en)),
                ],
                'date_of_birth' => Carbon::parse($this->date_of_birth)->format('Y-m-d'),
                'joined_at' => Carbon::parse($this->joined_at)->format('Y-m-d'),
                'jersey_number' => $this->jersey_number,
                'height' => $this->height,
                'weight' => $this->weight,
                'status' => $this->status,
            ]);

            $this->dispatch('notify', [
                'message' => __('Player added successfully'),
                'type' => 'success',
            ]);
        }

        // Prepare Position Sync Data
        $positionSync = [];
        foreach ($this->selected_position as $posId) {
            $positionSync[$posId] = [
                'is_primary' => ((string) $posId === (string) $this->primary_position_id),
            ];
        }
        $player->positions()->sync($positionSync);

        // Prepare Skills Sync Data
        $skillsSync = [];
        foreach ($this->selected_skills as $skill) {
            if (! empty($skill['skill_id'])) {
                $skillsSync[$skill['skill_id']] = [
                    'value' => $skill['value'],
                ];
            }
        }
        $player->skills()->sync($skillsSync);

        if ($this->image && $this->image instanceof UploadedFile) {

            $player->addMedia($this->image)
                ->toMediaCollection('player_image');
        }

        $this->clear();
        $this->screen = 'list';
    }

    public function edit(Player $player)
    {
        $this->resetValidation();
        $this->name_ar = $player->getTranslation('name', 'ar');
        $this->name_en = $player->getTranslation('name', 'en');
        $this->description_ar = $player->getTranslation('description', 'ar');
        $this->description_en = $player->getTranslation('description', 'en');
        $this->image = $player->getFirstMedia('player_image');
        $this->date_of_birth = $player->date_of_birth;
        $this->joined_at = $player->joined_at;
        $this->jersey_number = $player->jersey_number;
        $this->height = $player->height;
        $this->weight = $player->weight;
        $this->status = $player->status;

        $this->selected_position = $player->positions->pluck('id')->toArray();
        $this->selected_skills = $player->skills()->withPivot('value')->get()->map(function ($skill) {
            return [
                'skill_id' => $skill->id,
                'type' => 'percentage',
                'value' => $skill->pivot->value,
            ];
        })->toArray();
        $this->primary_position_id = $player->positions->where('pivot.is_primary', true)->first()->id;

        $this->edit_player = $player;

        $this->screen = 'form';
    }

    public function render()
    {
        $query = Player::query();

        // Age Range
        if (! empty($this->filters['age_min'])) {
            $query->where('date_of_birth', '<=', Carbon::now()->subYears($this->filters['age_min']))->orWhere('date_of_birth', '>=', Carbon::now()->subYears($this->filters['age_max']));
        }

        // Joined Date Interval
        if (! empty($this->filters['joined_date_from'])) {
            $query->where('joined_at', '>=', $this->filters['joined_date_from']);
        }
        if (! empty($this->filters['joined_date_to'])) {
            $query->where('joined_at', '<=', $this->filters['joined_date_to']);
        }

        // Primary Position Only
        if ($this->filters['primary_position_only']) {
            $query->whereHas('positions', function ($q) {
                $q->where('is_primary', true);
            });
        }

        // Positions
        if (! empty($this->filters['positions'])) {
            $query->whereHas('positions', function ($q) {
                $q->whereIn('position_id', $this->filters['positions']);
            });
        }

        // Skills
        if (! empty($this->filters['skills'])) {
            foreach ($this->filters['skills'] as $skillId => $skillFilter) {
                if (empty($skillFilter['min_value'])) {
                    $skillFilter['min_value'] = 0;
                }
                if (empty($skillFilter['max_value'])) {
                    $skillFilter['max_value'] = 100;
                }
                $query->whereHas('skills', function ($q) use ($skillId, $skillFilter) {
                    $q->where('skill_id', $skillId)
                        ->where('value', '>=', $skillFilter['min_value'])
                        ->where('value', '<=', $skillFilter['max_value']);
                });
            }
        }

        // Height Range
        if (! empty($this->filters['height_min'])) {
            $query->where('height', '>=', $this->filters['height_min']);
        }
        if (! empty($this->filters['height_max'])) {
            $query->where('height', '<=', $this->filters['height_max']);
        }

        // Weight Range
        if (! empty($this->filters['weight_min'])) {
            $query->where('weight', '>=', $this->filters['weight_min']);
        }
        if (! empty($this->filters['weight_max'])) {
            $query->where('weight', '<=', $this->filters['weight_max']);
        }

        // Status
        $activeStatuses = collect($this->filters['status'])
            ->filter(fn ($value) => $value)
            ->keys()
            ->toArray();

        if (! empty($activeStatuses)) {
            $query->whereIn('status', $activeStatuses);
        }

        $players = $query->latest()->get();

        return view('livewire.tenant.player.player-managment', [
            'players' => $players,
            'positions' => Position::all(),
            'skills' => Skill::all(),
        ]);
    }

    public function delete(Player $player)
    {
        $player->delete();
        $this->dispatch('notify', [
            'message' => __('Player deleted successfully'),
            'type' => 'success',
        ]);
    }

    public function clear()
    {
        $this->reset();
    }

    public function applyFilters()
    {

        $this->screen = 'list';
    }

    public function clearFilters()
    {
        $this->reset('filters');
        $this->screen = 'list';
    }
}
