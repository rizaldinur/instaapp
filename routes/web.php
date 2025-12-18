<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {

    $posts = [
        (object) [
            'image_path' => 'https://picsum.photos/600/400',
            'caption' => 'Post pertama di InstaApp',
            'comments' => collect([])
        ],
        (object) [
            'image_path' => 'https://picsum.photos/600/400',
            'caption' => 'Post kedua dengan caption',
            'comments' => collect([])
        ],
    ];

    return view('index', compact('posts'));
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');
