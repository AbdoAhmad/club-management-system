<?php

namespace App\Livewire\tenant;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.tenant_dashboard.app')]
class PositionManagment extends Component
{
    public function render()
    {
        return view('livewire.tenant.position-managment');
    }
}
