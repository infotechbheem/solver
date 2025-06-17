<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    $roles = Role::get();
    return view('login', compact('roles'));
})->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('post.login');
});

require __DIR__ . '/admin.php';
