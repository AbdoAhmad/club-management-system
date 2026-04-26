<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\admin\TenantsMangment;
use App\Livewire\admin\Home;

Route::prefix('dashboard')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('tenants', TenantsMangment::class)->name('tenant');
});