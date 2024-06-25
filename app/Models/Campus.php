<?php

namespace App\Models;

use App\Models\TutorAd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campus extends Model
{
    use HasFactory;

    // Table connection
    protected $table = 'campuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school',
        'country',
        'state',
        'city'
    ];

    // Define relationship to users
    public function users()
    {
        return $this->hasMany(User::class, 'campus_id');
    }

    // Define relationship to tutor ads
    public function ads()
    {
        return $this->hasMany(TutorAd::class, 'campus_id');
    }
}
