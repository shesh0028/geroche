<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionLog extends Model
{
    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }
    
}
