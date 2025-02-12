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
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin/courses/save', [CourseController::class, 'save'])->name('admin.courses.save');
    Route::get('/admin/courses/edit/{id}', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin/courses/edit/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::get('/admin/courses/delete/{id}', [CourseController::class, 'delete'])->name('admin.courses.delete');
    Route::get('/admin/courses/show/{id}', [CourseController::class, 'show'])->name('admin.courses.show');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');

    Route::get('/admin/{course}/lessons/create', [LessonController::class, 'create'])->name('admin.lessons.create');
    Route::post('/admin/{course}/lessons', [LessonController::class, 'store'])->name('admin.lessons.store');
    Route::get('/admin/lessons/{lesson}', [LessonController::class, 'show'])->name('admin.lessons.show');
    Route::get('/admin/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('admin.lessons.edit');
    Route::put('/admin/lessons/{lesson}', [LessonController::class, 'update'])->name('admin.lessons.update');
    Route::delete('/admin/lessons/{lesson}', [LessonController::class, 'destroy'])->name('admin.lessons.destroy');

    Route::get('/admin/lessons/{lesson}/videos/create', [VideoController::class, 'create'])->name('admin.lessons.videos.create');
    Route::post('/admin/lessons/{lesson}/videos', [VideoController::class, 'store'])->name('admin.lessons.videos.store');


    Route::get('/admin/lessons/{lesson}/quizzes/create', [QuizController::class, 'create'])->name('admin.quizzes.create');
    Route::post('/admin/lessons/{lesson}/quizzes', [QuizController::class, 'store'])->name('admin.quizzes.store');

    Route::get('/admin/lessons/quizzes/{quiz}', [QuizController::class, 'show'])->name('admin.lessons.quizzes.show');
    Route::post('/admin/lessons/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('admin.lessons.quizzes.submit');

    Route::get('/admin/lessons/quizzes/{quiz}/questions/create', [QuestionController::class, 'create'])->name('admin.questions.create');
    Route::get('/admin/lessons/quizzes/{quiz}/questions/show', [QuestionController::class, 'show'])->name('admin.questions.show');
    Route::post('/admin/lessons/quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('admin.questions.store');

});
