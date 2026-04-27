<?php

declare(strict_types=1);

use App\Livewire\tenant\Home;
use App\Livewire\tenant\PlayerManagment;
use App\Livewire\tenant\PositionManagment;
use App\Livewire\tenant\SkillManagment;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::group(['prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

        require __DIR__.'/auth/tenant_auth.php';
        Route::prefix('tenant')->middleware('userAuth')->group(function () {
            Route::get('home', Home::class)->name('tenant_dashboard');
            Route::get('players', PlayerManagment::class)->name('players');
            Route::get('skills', SkillManagment::class)->name('skills');
            Route::get('positions', PositionManagment::class)->name('positions');
        });
    });

    Route::get('/', function () {
        return redirect()->route('tenant_dashboard');
    });

});
