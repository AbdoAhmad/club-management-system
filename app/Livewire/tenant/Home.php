<?php

namespace App\Livewire\tenant;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.tenant_dashboard.app')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.tenant_dashbard.home');
    }
}
