<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GlobalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// GENERIC ROUTES

// List all tasks
Route::get('/tasks', [GlobalController::class, 'tasks']);

// Specific task details
Route::get('/task/{id}', [GlobalController::class, 'task']);

// Apply for specific task
Route::post('/task/{id}/apply', [GlobalController::class, 'apply_task']);



// GUEST ROUTES

Route::group(['middleware' => ['guest']], function () {
    // Define your guest routes here
    Route::post('/login', [GuestController::class, 'login']);
    Route::post('/register', [GuestController::class, 'register']);
    // Any other routes accessible without authentication
});



// AUTH ROUTES

Route::group(['middleware' => ['auth:sanctum']], function () {
    // User profile route
    Route::get('/user', [AuthController::class, 'user']);

    // User tasks route
    Route::get('/user/tasks', [AuthController::class, 'user_tasks']);

    // User specific task
    Route::get('/user/task/{id}', [AuthController::class, 'user_task']);

    // User create task
    Route::get('/user/create/task', [AuthController::class, 'user_create_task']);

    // User create ad
    Route::get('/user/create/ad', [AuthController::class, 'user_create_ad']);

    // User Logout
    Route::post('/user/logout', [AuthController::class, 'user_logout']);
});
