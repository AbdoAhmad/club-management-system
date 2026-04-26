<?php

namespace App\Livewire\auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

#[Layout('layouts.auth')]
class Register extends Component
{
    use WithFileUploads;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public $role;

    public $avatar;

    public $terms;

    public $remember = false;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
            'terms' => 'accepted',
            'avatar' => 'nullable|image|max:1024',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->role);

        if ($this->avatar) {
            $user->addMedia($this->avatar->getRealPath())
                ->toMediaCollection('attachments');
        }
        
        Auth::login($user, $this->remember);

        return redirect()->route('tenant_dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register', [
            'roles' => Role::all(),
        ]);
    }
}
