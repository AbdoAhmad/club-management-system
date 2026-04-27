<?php

namespace App\Livewire\tenant;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.tenant_dashboard.app')]
class SkillManagment extends Component
{
    public $screan = 'list';

    public function mount()
    {
        $this->screan = request('screan', 'list');
    }

    public function render()
    {
        return view('livewire.tenant.skill.skill-managment');
    }
}
