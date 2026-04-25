<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TenantsMangment;
use App\Livewire\Home;

Route::prefix('dashboard')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('tenants', TenantsMangment::class)->name('tenant');
    Route::get('login', \App\Livewire\auth\Login::class)->name('login');
});