<?php

namespace App\Livewire\tenant;

use App\Models\Skill;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


#[Layout('layouts.tenant_dashboard.app')]
class SkillManagment extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $showModal = false;
    public $search = '';

    #[Rule('required')]
    public $skill_name_en;

    #[Rule('required')]
    public $skill_name_ar;

    #[Rule('nullable|image|mimes:png,jpg,jpeg,gif|max:1024')]
    public $icon;

    public $edit_skill;

    public function openModal()
    {
        $this->reset(['skill_name_en', 'skill_name_ar', 'icon', 'edit_skill']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->showModal = false;
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
        $skills = $query->paginate(10);

        return view('livewire.tenant.skill.skill-managment', ['skills' => $skills]);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => [
                'en' => $this->skill_name_en,
                'ar' => $this->skill_name_ar,
            ],
        ];

        if ($this->edit_skill) {
            $this->edit_skill->update($data);
            $skill = $this->edit_skill;
            session()->flash('success', 'Skill updated successfully');
        } else {
            $skill = Skill::create($data);
            session()->flash('success', 'Skill created successfully');
        }

        if ($this->icon) {
            $skill->addMedia($this->icon)->toMediaCollection('skills');
        }

        $this->closeModal();
    }

  
    public function edit(Skill $skill)
    {
        $this->resetValidation();
        $this->skill_name_en = $skill->getTranslation('name', 'en');
        $this->skill_name_ar = $skill->getTranslation('name', 'ar');
        $this->icon = null;
        $this->edit_skill = $skill; 
        $this->showModal = true;
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        session()->flash('success', 'Skill deleted successfully');
    }

 
}
