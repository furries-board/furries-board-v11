<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', function () {
    return Inertia::render("Front/Home");
})->name('home');

Route::get('/timeline', function () {
    return Inertia::render("Front/Timeline");
})->name('timeline');

Route::get('/explore', function () {
    return Inertia::render("Front/Explore");
})->name('explore');