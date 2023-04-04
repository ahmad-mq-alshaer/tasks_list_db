<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('tasks');

Route::post('insert', [TaskController::class, 'insert'])->name('task.insert');

Route::delete('delete/{id}', [TaskController::class, 'delete'])->name('task.delete');

Route::delete('edit/{id}', [TaskController::class, 'edit'])->name('task.edit');


// Route::get('tasks', function () {
//     return view('tasks');
// });
