<?php

use Illuminate\Database\Seeder;
use App\Models\UserProfile;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\NutritionLog;

class FitnessSeeder extends Seeder
{
    public function run(): void
    {
        $user = UserProfile::create([
            'name' => 'Alice',
            'age' => 28,
            'weight' => 65.0,
            'height' => 170.0,
        ]);

        $w1 = Workout::create([
            'user_profile_id' => $user->id,
            'date' => '2024-05-10',
            'duration' => 60,
        ]);

        $w2 = Workout::create([
            'user_profile_id' => $user->id,
            'date' => '2024-05-12',
            'duration' => 45,
        ]);

        Exercise::insert([
            ['workout_id' => $w1->id, 'name' => 'Squat', 'sets' => 3, 'reps' => 12, 'weight' => 60],
            ['workout_id' => $w1->id, 'name' => 'Bench Press', 'sets' => 3, 'reps' => 10, 'weight' => 40],
            ['workout_id' => $w2->id, 'name' => 'Deadlift', 'sets' => 3, 'reps' => 8, 'weight' => 70],
            ['workout_id' => $w2->id, 'name' => 'Pull Up', 'sets' => 3, 'reps' => 10, 'weight' => 0],
        ]);

        NutritionLog::insert([
            ['user_profile_id' => $user->id, 'date' => '2024-05-10', 'calories' => 2200, 'protein' => 120, 'carbs' => 250, 'fats' => 70],
            ['user_profile_id' => $user->id, 'date' => '2024-05-11', 'calories' => 2100, 'protein' => 110, 'carbs' => 230, 'fats' => 65],
            ['user_profile_id' => $user->id, 'date' => '2024-05-12', 'calories' => 2000, 'protein' => 100, 'carbs' => 220, 'fats' => 60],
            ['user_profile_id' => $user->id, 'date' => '2024-05-13', 'calories' => 2300, 'protein' => 130, 'carbs' => 270, 'fats' => 75],
        ]);
    }
}