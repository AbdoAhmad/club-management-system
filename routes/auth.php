<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\auth\Login;

Route::get('login', Login::class)->name('login');

