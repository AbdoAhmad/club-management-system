<?php

namespace App\Livewire\auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.auth')]
class Login extends Component
{
    #[Rule('required|email')]
    public $email;
    
    #[Rule('required')]
    public $password;

    public $remember = false;

    public function login(){
        $this->validate();
        Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember);
        
        dd(Auth::user());

    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
