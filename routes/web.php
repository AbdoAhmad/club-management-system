<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

// routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', Home::class)->name('home');
});
