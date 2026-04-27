<?php

use App\Livewire\admin\Home;
use App\Livewire\admin\TenantsMangment;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    require __DIR__.'/auth/admin_auth.php';

    Route::middleware('adminAuth')->group(function () {
        Route::get('/', Home::class)->name('home');
        Route::get('tenants', TenantsMangment::class)->name('tenant');
    });
});
