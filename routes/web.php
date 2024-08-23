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
    // add member to project
    Route::post('projects/{project}/members', [App\Http\Controllers\ProjectMemberController::class, 'store'])->name('projects.members.store');
    // project accept
    Route::get('projects/{project}/members/accept', [App\Http\Controllers\ProjectMemberController::class, 'accept'])->name('projects.members.accept');


    Route::resource('sprints', App\Http\Controllers\SprintController::class)
        ->except(['create', 'edit']);

    Route::resource('sprint/{sprint}/comments', App\Http\Controllers\CommentController::class)->only(['store', 'destroy']);

    Route::resource('tasks', App\Http\Controllers\TaskController::class);

    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


    Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
});

// admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', App\Http\Controllers\Admin\AdminUserController::class)->except(['index', 'show', 'create', 'store', 'edit', 'update'])->names('admin.users');
    // setAvatars
    Route::get('set-avatars', [App\Http\Controllers\Admin\DashboardController::class, 'setAvatars'])->name('admin.set-avatars');
});
