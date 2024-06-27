<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    // GET /api/tasks
    public function tasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // GET /api/tasks/{id}
    public function task($id)
    {
        $task = Task::with('applications.user')->find($id);
        if ($task) {
            return response()->json($task);
        } else {
            return response()->json(['error' => 'Task not found'], 404);
        }
    }

    // GET /api/tasks/{id}/apply
    public function apply_task($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }
}
