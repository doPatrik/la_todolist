<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::post('/todo-store', [\App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
Route::put('/todo-complete/{id_todo}', [\App\Http\Controllers\TodoController::class, 'complete'])->name('todo.complete');
Route::put('/todo-delayed/{id_todo}', [\App\Http\Controllers\TodoController::class, 'delayed'])->name('todo.delayed');
Route::delete('/todo-destroy/{id_todo}', [\App\Http\Controllers\TodoController::class, 'destroy'])->name('todo.destroy');
Route::get('/todo-edit/{id_todo}', [\App\Http\Controllers\TodoController::class, 'edit'])->name('todo.edit');
Route::post('/todo-update/{id_todo}', [\App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');
