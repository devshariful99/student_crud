<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/show/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::get('/status/{id}', [StudentController::class, 'status'])->name('student.status');