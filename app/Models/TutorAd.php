<?php

namespace App\Models;

use App\Models\User;
use App\Models\Campus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TutorAd extends Model
{
    use HasFactory;

    // Table coneection
    protected $table = 'tutor_ads';

    // Define relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship to campus
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
