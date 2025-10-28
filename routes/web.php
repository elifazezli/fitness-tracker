<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthProfileController; 
use App\Http\Controllers\BodyMeasurementController;
use App\Http\Controllers\WorkoutPlanController;
use App\Http\Controllers\WorkoutExerciseController;
use App\Http\Controllers\UserProgressController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::resource('health-profile', HealthProfileController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::resource('measurements', BodyMeasurementController::class);
    Route::resource('workout-plans', WorkoutPlanController::class);
    Route::post('workout-plans/{plan}/exercises', [WorkoutExerciseController::class, 'store'])->name('exercises.store');
    Route::delete('exercises/{exercise}', [WorkoutExerciseController::class, 'destroy'])->name('exercises.destroy');
    Route::resource('progress', UserProgressController::class)->only(['index', 'create', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
