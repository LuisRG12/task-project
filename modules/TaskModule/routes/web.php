<?php

use Modules\TaskModule\Http\Controllers\TaskController;
use Modules\TaskModule\Http\Controllers\HomeController;
use Modules\TaskModule\Http\Controllers\GenderController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

Route::get('/gender/register', [GenderController::class, 'genderIndex'])->name('gender/register');
Route::get('/tasks/update', [TaskController::class, 'update'])->name('tasks/update');
Route::post('/task/store', [TaskController::class, 'task_store'])->name('task/store');

Route::get('/taskObtener', [TaskController::class, 'taskObtener']);

Route::post('/task/edit', [TaskController::class, 'taskEdit'])->name('task/edit');

Route::post('/task/delete', [TaskController::class, 'task_delete'])->name('task/delete');
Route::post('/gender/store', [GenderController::class, 'genderStore'])->name('gender/store');

Route::get('/genders/update', [GenderController::class, 'gendersUpdate'])->name('genders/update');
Route::post('/gender/edit', [GenderController::class, 'gender_edit'])->name('gender/edit');
Route::post('/gender/get', [GenderController::class, 'genderGet'])->name('gender/get');
Route::post('/gender/delete', [GenderController::class, 'genderDelete'])->name('gender/delete');

Route::get('/selector/gender', [GenderController::class, 'UpdateSelector'])->name('selector/gender');

Route::post('/task/get', [TaskController::class, 'TaskGet'])->name('task/get');