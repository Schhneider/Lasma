<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

Route::redirect('/', 'todo'); 
Route::resource('todo', ToDoController::class); 
Route::get('add', [ToDoController::class, 'create']);
Route::post('/todo/store', [ToDoController::class, 'store'])->name('todo.store');
Route::get('edit/{id}', [ToDoController::class, 'edit']); 
Route::put('/todo/update', [ToDoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}', [ToDoController::class, 'destroy'])->name('todo.destroy');
?>