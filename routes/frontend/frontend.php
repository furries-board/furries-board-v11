<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render("Front/Home", [
        "boards" => \App\Models\Board::with('user')->get()
    ]);
})->name('home');

Route::get('/timeline', function () {
    return Inertia::render("Front/Timeline");
})->name('timeline');

Route::get('/explore', function () {
    return Inertia::render("Front/Explore");
})->name('explore');