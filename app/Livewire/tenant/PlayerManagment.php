<?php

namespace App\Livewire\tenant;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.tenant_dashboard.app')]
class PlayerManagment extends Component
{
    public $screan = 'list';


    public function addPlayer()
    {
        $this->screan = 'form';
    }
    public function mount()
    {
        $this->screan = request('screan');
    }
    public function render()
    {
        
        return view('livewire.tenant.player.player-managment');
    }
}
