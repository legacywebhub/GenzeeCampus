<?php

namespace App\Models;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskApplication extends Model
{
    use HasFactory;

    // Table connection & settings
    protected $table = 'task_applications';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_id',
        'user_id',
        'status'
    ];

    // Define relationship to task
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    // Define relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
