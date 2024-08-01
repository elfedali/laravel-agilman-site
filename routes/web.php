<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');
    //Route::get('/home', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');

    Route::resource('projects', App\Http\Controllers\ProjectController::class)
        ->except(['create', 'edit']);


    Route::resource('sprints', App\Http\Controllers\SprintController::class)
        ->except(['create', 'edit']);

    Route::resource('sprint/{sprint}/comments', App\Http\Controllers\CommentController::class)->only(['store', 'destroy']);

    Route::resource('tasks', App\Http\Controllers\TaskController::class);

    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


    Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
});
