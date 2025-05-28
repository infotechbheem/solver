<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/check-email-availability', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['isEmailAvailable' => true, 'message' => 'Email already in use.'], 200);
    }

    return response()->json(['isEmailAvailable' => false, 'message' => 'Email available.'], 200);
})->name('check-email-availability');
