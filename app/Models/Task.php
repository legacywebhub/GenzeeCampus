<?php

namespace App\Models;

use App\Models\User;
use App\Models\TaskCategory;
use App\Models\FileAttachment;
use App\Models\TaskApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    // Table connection
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'task_category_id',
        'title',
        'description',
        'course',
        'completion_deadline',
        'payment_amount',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completion_deadline' => 'datetime',
    ];

    // Define relationship to task category
    public function category()
    {
        return $this->belongsTo(TaskCategory::class, 'task_category_id');
    }

    // Define relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship to task applications
    public function applications()
    {
        return $this->hasMany(TaskApplication::class, 'task_id');
    }

    // Define relationship to file attachments
    public function attachments()
    {
        return $this->hasMany(FileAttachment::class, 'task_id');
    }
}
