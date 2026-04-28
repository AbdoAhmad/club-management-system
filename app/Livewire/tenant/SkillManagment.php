<?php

namespace App\Livewire\tenant;

use App\Models\Skill;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.tenant_dashboard.app')]
class SkillManagment extends Component
{
    use WithFileUploads;

    public $screan = 'list';

    public $search = '';

    #[Rule('required')]
    public $skill_name_en;

    #[Rule('required')]
    public $skill_name_ar;

    #[Rule('nullable|image|mimes:png,jpg,jpeg,gif|max:1024')]
    public $icon;

    public $edit_skill;

    protected $queryString = ['screan'];

    public function mount()
    {
        
        $this->screan = request('screan', 'list');

    }

    public function render()
    {
        $query = Skill::query();

        if ($this->search) {
            // حط الـ OR جوه function عشان تعزلها
            $query->where(function ($q) {
                $q->where('name->en', 'like', '%'.$this->search.'%')
                    ->orWhere('name->ar', 'like', '%'.$this->search.'%');
            });
        }
        $skills = $query->get();

        return view('livewire.tenant.skill.skill-managment', ['skills' => $skills]);
    }

    public function save()
    {
        $this->validate();
        $skill = Skill::create([
            'name' => [
                'en' => $this->skill_name_en,
                'ar' => $this->skill_name_ar,
            ],
        ]);

        if ($this->icon) {
            $skill->addMedia($this->icon)->toMediaCollection('skills');
        }
        session()->flash('success', 'Skill created successfully');
        $this->reset();
        $this->screan = 'list';
    }

    public function changeScreen($screen)
    {
        $this->screan = $screen;
    }

    public function edit(Skill $skill)
    {
        $this->skill_name_en = $skill->getTranslation('name', 'en');
        $this->skill_name_ar = $skill->getTranslation('name', 'ar');
        $this->icon = $skill->getFirstMediaUrl('skills');
        $this->edit_skill = $skill;
        $this->changeScreen('form');
    }

    public function cancel()
    {
        $this->reset();
        $this->screan = 'list';
    }
}
