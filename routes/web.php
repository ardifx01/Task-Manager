<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('loginform.login');
});

Route::get('/login', function () {
    return view('loginform.login');
});

Route::get('/register', function () {
    return view('loginform.register');
});

Route::get('/error', function () {
    return view('notfound.404');
});
