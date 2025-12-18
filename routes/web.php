<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
