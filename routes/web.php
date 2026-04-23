<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// routes/web.php
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes
        Route::group(['prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        ], function () {
            /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
            Route::get('/', Home::class)->name('home');
        });
    });
}
