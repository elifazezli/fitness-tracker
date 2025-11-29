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
//Health Profile Routes

Route::middleware(['auth'])->group(function () {
    Route::get('/health-profile', [HealthProfileController::class, 'index'])->name('health-profile.show');
    Route::get('/health-profile/create', [HealthProfileController::class, 'create'])->name('health-profile.create');
    Route::post('/health-profile', [HealthProfileController::class, 'store'])->name('health-profile.store');
    Route::get('/health-profile/edit', [HealthProfileController::class, 'edit'])->name('health-profile.edit');
    Route::put('/health-profile', [HealthProfileController::class, 'update'])->name('health-profile.update');
});
// Body Measurements Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/measurements', [BodyMeasurementController::class, 'index'])
        ->name('measurements.index');
    Route::get('/measurements/create', [BodyMeasurementController::class, 'create'])
        ->name('measurements.create');
    Route::post('/measurements', [BodyMeasurementController::class, 'store'])
        ->name('measurements.store');
    Route::get('/measurements/{measurement}', [BodyMeasurementController::class, 'show'])
        ->name('measurements.show');
    Route::delete('/measurements/{measurement}', [BodyMeasurementController::class, 'destroy'])
        ->name('measurements.destroy');
});
// Workout Plan Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/workout-plans', [WorkoutPlanController::class, 'index'])->name('workout-plans.index');
    Route::get('/workout-plans/create', [WorkoutPlanController::class, 'create'])->name('workout-plans.create');
    Route::post('/workout-plans', [WorkoutPlanController::class, 'store'])->name('workout-plans.store');
    Route::get('/workout-plans/{plan}', [WorkoutPlanController::class, 'show'])->name('workout-plans.show');
    Route::get('/workout-plans/{plan}/edit', [WorkoutPlanController::class, 'edit'])->name('workout-plans.edit');
    Route::put('/workout-plans/{plan}', [WorkoutPlanController::class, 'update'])->name('workout-plans.update');
    Route::delete('/workout-plans/{plan}', [WorkoutPlanController::class, 'destroy'])->name('workout-plans.destroy');
});
