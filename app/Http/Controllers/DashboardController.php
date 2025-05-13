<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the first user from the database
        $user = UserProfile::first();

        // If no user exists, return a simple error message
        if (!$user) {
            return response("No user profile found. Please run: php artisan db:seed", 404);
        }

        // Safe to call relationships now
        $totalWorkouts = $user->workouts()->count();
        $averageDuration = round($user->workouts()->avg('duration'), 1);

        $exerciseCounts = DB::table('exercises')
            ->select('name', DB::raw('count(*) as total'))
            ->groupBy('name')
            ->pluck('total', 'name');

        $nutritionData = $user->nutritionLogs()
            ->orderBy('date')
            ->get(['date', 'calories', 'protein', 'carbs', 'fats']);

        return view('dashboard', compact(
            'user',
            'totalWorkouts',
            'averageDuration',
            'exerciseCounts',
            'nutritionData'
        ));
    }
}
