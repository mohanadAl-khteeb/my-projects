<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/projects' , ProjectController::class);
Route::post('projects/{project}/tasks' , [TaskController::class , 'store']);
Route::patch('projects/{project}/tasks/{task}' ,[TaskController::class , 'update']);
Route::delete('projects/{project}/tasks/{task}' ,[TaskController::class , 'destroy'])->name('tasks.destroy');
Route::resource('/profile' , ProfileController::class);
Route::patch('/profile' , [ProfileController::class,"update"]);
