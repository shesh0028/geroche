<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public function workouts() {
        return $this->hasMany(Workout::class);
    }
    
    public function nutritionLogs() {
        return $this->hasMany(NutritionLog::class);
    }
    
}
