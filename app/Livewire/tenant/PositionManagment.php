<?php

namespace App\Livewire\tenant;

use App\Models\Position;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.tenant_dashboard.app')]
class PositionManagment extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $showModal = false;

    public $search = '';

    #[Rule('required')]
    public $position_name_en;

    #[Rule('required')]
    public $position_name_ar;

    #[Computed]
    public function position_code()
    {
        $name = trim($this->position_name_en);
        if (! $name) {
            return '';
        }

        // Normalize: replace hyphens and slashes with spaces to handle "Center-Back"
        // Normalize: replace hyphens and slashes with spaces
        $normalized = str_replace(['-', '/'], ' ', $name);
        $words = array_filter(explode(' ', $normalized));
        $count = count($words);

        // Map for professional football abbreviations
        $mapping = [
            'GOALKEEPER' => 'GK',
            'FORWARD'    => 'FW',
            'STRIKER'    => 'ST',
            'SWEEPER'    => 'SW',
            'MIDFIELDER' => 'MF',
            'MIDFIELD'   => 'MF',
        ];

        // 1. Single word cases (Check mapping FIRST)
        if ($count === 1) {
            $word = strtoupper(reset($words));
            if (isset($mapping[$word])) {
                return $mapping[$word];
            }
            return substr($word, 0, 3);
        }

        // 2. Specific 2-word Midfielder cases (DMF, AMF, CMF)
        if ($count === 2) {
            $w1 = strtoupper($words[array_key_first($words)]);
            $w2 = strtoupper($words[array_key_last($words)]);
            if ($w2 === 'MIDFIELDER' || $w2 === 'MIDFIELD') {
                if ($w1 === 'DEFENSIVE') return 'DMF';
                if ($w1 === 'ATTACKING') return 'AMF';
                if ($w1 === 'CENTER' || $w1 === 'CENTRE') return 'CMF';
            }
        }

        // 3. Generic rule: First letter of each word
        $code = '';
        foreach ($words as $word) {
            $code .= strtoupper($word[0]);
        }

        return $code;
    }

    public $edit_position;

    public function openModal()
    {
        $this->reset(['position_name_en', 'position_name_ar', 'edit_position']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->showModal = false;
    }

    public function render()
    {
        $query = Position::query();

        if ($this->search) {
            // حط الـ OR جوه function عشان تعزلها
            $query->where(function ($q) {
                $q->where('name->en', 'like', '%'.$this->search.'%')
                    ->orWhere('name->ar', 'like', '%'.$this->search.'%')
                    ->orWhere('code', 'like', '%'.$this->search.'%');
            });
        }
        $positions = $query->paginate(10);

        return view('livewire.tenant.position.position-managment', ['positions' => $positions]);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => [
                'en' => $this->position_name_en,
                'ar' => $this->position_name_ar,
            ],
            'code' => $this->position_code,
        ];

        if ($this->edit_position) {
            $this->edit_position->update($data);
            session()->flash('success', 'Position updated successfully');
        } else {
            Position::create($data);
            session()->flash('success', 'Position created successfully');
        }

        $this->closeModal();
    }

    public function edit(Position $position)
    {
        $this->resetValidation();
        $this->position_name_en = $position->getTranslation('name', 'en');
        $this->position_name_ar = $position->getTranslation('name', 'ar');
        $this->edit_position = $position;
        $this->showModal = true;
    }

    public function delete(Position $position)
    {
        $position->delete();
        session()->flash('success', 'Position deleted successfully');
    }
}
