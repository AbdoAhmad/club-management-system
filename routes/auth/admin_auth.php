<?php

use App\Livewire\admin\auth\Login;
use App\Livewire\admin\auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('login', Login::class)->name('admin.login');
Route::get('register', Register::class)->name('admin.register');
