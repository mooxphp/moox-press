<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('{any}', function ($any) {

    if (! str_contains(request()->server()['REQUEST_URI'], '/wp/')) {

        return redirect('/wp/'.ltrim(request()->path(), '/'));
    }
})->where('any', '.*');
