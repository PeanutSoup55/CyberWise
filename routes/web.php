<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserControllers\CourseController as UserCourseController;
use App\Http\Controllers\UserControllers\LessonController as UserLessonController;
use App\Http\Controllers\UserControllers\QuizController as UserQuizController;
use App\Http\Controllers\UserControllers\HomeController as UserHomeController;

Route::get('/', function () {
    return view('welcome');
});


// PROFILE ROUTES (only accessible by authenticated users)
Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

// AUTHENTICATION ROUTES
require __DIR__.'/auth.php';

//ADMIN ROUTES (requires auth and the admin role)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {


    //ADMIN DASHBOARD
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    //COURSES ROUTES (resourceful routes for managing courses)
    Route::resource('courses', CourseController::class);

    // USER ROUTES (resourceful routes for managing users (minus create and update)
    Route::resource('users', UserController::class)->only(['index', 'destroy']);

    // LESSONS ROUTES (resource routes for managing lessons within courses)
    Route::resource('courses.lessons', LessonController::class)->shallow();

    //VIDEO ROUTES (resource routes for managing videos from within lessons)
    Route::resource('lessons.videos', VideoController::class)->shallow()->only(['create', 'store']);

    //QUIZ ROUTES (resource routes for managing quizzes from within lessons)
    Route::resource('lessons.quizzes', QuizController::class)->only(['create', 'show', 'store', 'edit', 'update', 'destroy']);
    Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');

    //QUESTIONS ROUTES (resource routes for managing quiz questions)
    Route::resource('quizzes.questions', QuestionController::class)->shallow()->only(['create', 'store', 'show']);

});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserHomeController::class, 'index'])->name('dashboard');

    // COURSE ROUTES
    Route::get('/courses', [UserCourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [UserCourseController::class, 'show'])->name('courses.show');

    // LESSON ROUTES
    Route::get('/lessons/{lesson}', [UserLessonController::class, 'show'])->name('courses.lessons');

    // QUIZ ROUTES
    Route::get('/quizzes/{quiz}', [UserQuizController::class, 'show'])->name('quizzes.show');
    Route::post('/quizzes/{quiz}', [UserQuizController::class, 'submit'])->name('quizzes.submit');
});
