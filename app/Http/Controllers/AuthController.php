<?php

namespace App\Http\Controllers;


use App\Models\Task;
use App\Models\TutorAd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // GET /api/user
    public function user(Request $request, $id)
    {
        $user = Auth::user();
    
        if ($user) {
            if ($request->has('include')) {
                $allowedIncludes = ['tasks', 'applications', 'ads']; // Add more as needed
                $includes = explode(',', $request->input('include'));
                $validIncludes = array_intersect($includes, $allowedIncludes);
    
                if (!empty($validIncludes)) {
                    $user->load($validIncludes);
                }
            }
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
    

    // GET /api/user/{id}/tasks
    public function user_tasks($id)
    {
        $tasks = User::find($id)->tasks;
        return response()->json($tasks);
    }


    // GET /api/user/{id}/tasks
    public function user_create_ad(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|int',
            'campus_id' => 'required|int',
            'headline' => 'required|string',
            'description' => 'required|string',
            'course_tags' => 'sometimes|required|string',
            'availability_schedule' => 'sometimes|required|string',
            'contact_info' => 'sometimes|required|string',
            'price' => 'required|int'
        ]);

        $ad = TutorAd::create($validatedData);

        return response()->json($ad);
    }


    // GET /api/user/logout
    public function user_logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
