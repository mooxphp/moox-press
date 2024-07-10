<?php

use Illuminate\Support\Facades\Route;
use Moox\Expiry\Http\Controllers\Api\ExpiryController;

if (config('expiry.api')) {
    Route::apiResource('api/expiries', ExpiryController::class);
}
