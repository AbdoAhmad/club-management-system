<?php

use App\Livewire\tenant\auth\Login;
use App\Livewire\tenant\auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('login', Login::class)->name('tenant.login');
Route::get('register', Register::class)->name('tenant.register');
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('admin.login');
})->name('tenant.logout');

