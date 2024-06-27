<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileAttachment extends Model
{
    use HasFactory;

    // Table connection & settings
    protected $table = 'file_attachments';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_id',
        'file_type',
        'file_url',
        'created_at',
    ];

    // Define reationship to task
    public function task() 
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
