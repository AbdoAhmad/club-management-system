<?php

namespace App\Livewire\tenant;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.tenant_dashboard.app')]
class SkillManagment extends Component
{
    public function render()
    {
        return view('livewire.tenant.skill-managment');
    }
}
