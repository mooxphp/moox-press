<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Moox\Press\Services\SessionValidator;

Route::get('/', function () {
    return view('welcome');
});

// most probably trash:
Route::get('/api/check-login', function () {
    if (auth()->check()) {

        $userId = auth()->id();
        $encryptedUserId = Crypt::encryptString(auth()->id());

        return response()->json(['status' => 'success', 'userId' => $userId]);
    }

    return response()->json(['status' => 'error']);
});

//->middleware('auth:api'); // Ensure this endpoint is protected

// currently testing this one:
Route::get('/api/session/validate', function (Request $request) {
    $sessionId = $request->input('session_id');
    $isValid = false;
    $userId = null;

    $validatedSession = SessionValidator::validateSession($request);

    echo '<pre>';
    var_dump($validatedSession);
    echo '</pre>';
    exit;

    return response()->json([
        'is_valid' => $isValid,
        'user_id' => $userId,
    ]);
});

//->middleware('auth:api'); // Ensure this endpoint is protected

Route::any('{any}', function ($any) {

    if (! str_contains(request()->server()['REQUEST_URI'], '/wp/')) {

        return redirect('/wp/'.ltrim(request()->path(), '/'));
    }
})->where('any', '.*');
