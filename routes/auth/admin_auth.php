<?php

use App\Livewire\admin\auth\Login;
use App\Livewire\admin\auth\Register;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('login', Login::class)->name('admin.login');
Route::get('register', Register::class)->name('admin.register');
// logout
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('admin.login');
})->name('admin.logout');
