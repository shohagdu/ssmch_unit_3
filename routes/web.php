<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Posts;

Route::get('/', function () {
//    return view('welcome');
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('posts', Posts::class)->middleware('auth');
