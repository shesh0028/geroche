<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }
    
    public function exercises() {
        return $this->hasMany(Exercise::class);
    }
}
