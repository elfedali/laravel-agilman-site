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
Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/projects', [App\Http\Controllers\PageController::class, 'index'])->name('page_projects');
// Route::get('/projects/{project}', [App\Http\Controllers\PageController::class, 'show'])->name('page_project_details');
// Route::get('/tasks/{task}', [App\Http\Controllers\PageController::class, 'task'])->name('page_project_task_details');





Route::resource('projects', App\Http\Controllers\ProjectController::class);

Route::resource('sprints', App\Http\Controllers\SprintController::class);

Route::resource('tasks', App\Http\Controllers\TaskController::class);
