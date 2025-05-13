<?php

use App\Models\UserProfile;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    $user = UserProfile::first();
    return "User: {$user->name} has " . $user->workouts->count() . " workouts.";
});


Route::get('/dashboard', [DashboardController::class, 'index']);
