<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
    Route::get('/project', function () {
        return view('project');
    });
    Route::get('/education', function () {
        return view('education');
    });