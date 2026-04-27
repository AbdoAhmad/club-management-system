<?php

namespace App\Livewire\tenant\auth;

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
        
        if (Auth::guard('web')->attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {
            session()->regenerate();
            return redirect()->intended(route('tenant_dashboard'));
        }

        $this->addError('email', __('auth.failed'));
    
    }
    public function render()
    {
        return view('livewire.tenant.auth.login');
    }
}
