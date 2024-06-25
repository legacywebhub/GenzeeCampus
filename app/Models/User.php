<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Task;
use App\Models\Campus;
use App\Models\TutorAd;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'bio',
        'email',
        'email_verified_at',
        'phone',
        'campus_id',
        //'role',
        //'kyc_verified',
        'profile_image_url',
        'overall_rating',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Define relationship to campus
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'user_id');
    }

    // Define relationship to tasks
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    // Define relationship to ads
    public function ads()
    {
        return $this->hasMany(TutorAd::class, 'user_id');
    }
}
