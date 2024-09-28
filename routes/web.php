<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "welcome";
});

Route::get('/welcome', function () {
    return view("welcome");
});