<?php

namespace App\Livewire\admin\auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

#[Layout('layouts.admin_auth')]
class Register extends Component
{
    use WithFileUploads;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    // public $role;

    public $avatar;

    public $terms;

    public $remember = false;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed:password_confirmation',
            // 'role' => 'required|exists:roles,name',
            'terms' => 'accepted',
            'avatar' => 'nullable|image|max:1024',
        ]);
        $user = Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        

        // $user->assignRole($this->role);

        if ($this->avatar) {
            $user->addMedia($this->avatar->getRealPath())
                ->toMediaCollection('attachments');
        }

        
        Auth::guard('admin')->login($user, $this->remember);
     

        return redirect()->route('home');
    }

    

    public function render()
    {
        return view('livewire.admin.auth.register', [
            // 'roles' => Role::all(),
        ]);
    }
}
