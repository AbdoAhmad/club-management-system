<?php

namespace App\Livewire\auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.auth')]
class Regester extends Component
{
    public function render()
    {
        return view('livewire.auth.regester');
    }
}
