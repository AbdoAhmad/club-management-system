<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\auth\Login;
use App\Livewire\auth\Register;

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

