<?php

use Illuminate\Support\Facades\Route;
use Moox\Expiry\Http\Controllers\Api\ExpiryController;

if (config('expiry.api')) {
    Route::get('api/expiries/count', [ExpiryController::class, 'count']);
    Route::get('api/expiries/count/{user}', [ExpiryController::class, 'countForUser']);
    Route::apiResource('api/expiries', ExpiryController::class);
}
