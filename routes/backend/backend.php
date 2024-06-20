<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

Route::put('/user/profile-board', function (User $user, Request $request) {

    $input = $request->all();
    $user = auth()->user();

    Validator::make($input, [
        'birthday' => ['nullable', 'string'],
        'age' => ['nullable'],
        'gender' => ['nullable'],
        'interest' => ['nullable'],
        'description' => ['nullable'],
    ])->validate();

    if (!$user->board()->exists())
    {
        $board = $user->board()->create([
            'user_id' => $user->id,
            'active' => $input['active'] ?? '1',
            'birthday' => $input['birthday'] ?? null,
            'age' => $input['age'] ?? null,
            'gender' => $input['gender'] ?? null,
            'interest' => $input['interest'] ?? null,
            'description' => $input['description'] ?? null,
        ]);
    } else {
        $board = $user->board()->update([
            'active' => $input['active'] ?? null,
            'birthday' => $input['birthday'] ?? null,
            'age' => $input['age'] ?? null,
            'gender' => $input['gender'] ?? null,
            'interest' => $input['interest'] ?? null,
            'description' => $input['description'] ?? null,
        ]);
    }

})->name('user-profile-board.update');





