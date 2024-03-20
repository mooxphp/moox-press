<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/wp');
});

Route::any('{any}', function ($any) {
    if (! str_contains(request()->path(), '/wp/')) {
        return redirect('/wp/'.ltrim(request()->path(), '/'));
    }
})->where('any', '.*');
