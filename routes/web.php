<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

/*
 | ------------------------ 
 |        Frontend
 | ------------------------
 */

Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
 | ------------------------ 
 |        Backend
 | ------------------------
 */

 Route::group([], function () {
    includeRouteFiles(__DIR__ . '/backend/');
});
