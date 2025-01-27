<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

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
 
    Route::get('admin/dashboard', [HomeController::class, 'index']);
 
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin/courses');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin/courses/create');
    Route::post('/admin/courses/save', [CourseController::class, 'save'])->name('admin/courses/save');
    Route::get('/admin/courses/edit/{id}', [CourseController::class, 'edit'])->name('admin/courses/edit');
    Route::put('/admin/courses/edit/{id}', [CourseController::class, 'update'])->name('admin/courses/update');
    Route::get('/admin/courses/delete/{id}', [CourseController::class, 'delete'])->name('admin/courses/delete');
    Route::get('/admin/courses/show/{id}', [CourseController::class, 'show'])->name('admin/courses/show');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin/users');
});