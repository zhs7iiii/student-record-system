<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout',[SessionController::class,'destroy']);



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });




    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/create', [CourseController::class, 'create']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit']);
    Route::patch('/courses/{course}', [CourseController::class, 'update']);
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);





    Route::get('/get-subjects/{course_id}', [SubjectController::class, 'getSubjects']);
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/subjects/create', [SubjectController::class, 'create']);
    Route::post('/subjects', [SubjectController::class, 'store']);
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit']);
    Route::patch('/subjects/{subject}', [SubjectController::class, 'update']);
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy']);





    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/create', [StudentController::class, 'create']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
    Route::patch('/students/{student}', [StudentController::class, 'update']);
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);





    Route::get('/seasons', [SeasonController::class, 'index']);
    Route::post('/seasons', [SeasonController::class, 'store']);


    Route::get('/password', [SessionController::class, 'password']);
    Route::post('/password', [SessionController::class, 'storePassword']);


    Route::get('/admin', [SessionController::class, 'admin']);
    Route::post('/admin', [SessionController::class, 'storeAdmin']);


    Route::get('/get-states/{country_id}', [LocationController::class, 'getStates']);
    Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities']);

});


