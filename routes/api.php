<?php

use App\Http\Controllers\Api\ExcursionSearchController;
use App\Http\Middleware\EnsureCasAccountHasAccess;
use Illuminate\Support\Facades\Route;
use Subfission\Cas\Middleware\CASAuth;

Route::middleware([CASAuth::class, EnsureCasAccountHasAccess::class])
    ->prefix('v1')
    ->group(function (): void {
        Route::post('search', ExcursionSearchController::class)->name('api.excursion.search');
    });
