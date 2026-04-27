<?php

namespace App\Livewire\admin\auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.auth')]
class Login extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required')]
    public $password;

    public $remember = false;

    public function login()
    {
        try {
            $this->validate();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        if (Auth::guard('admin')->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            session()->regenerate();

            return redirect()->intended(route('home'));
        }

        $this->addError('email', __('auth.failed'));

    }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
