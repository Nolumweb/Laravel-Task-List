<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\TaskController;

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

// Route::get('/task', function () {
//     return view('welcome');
// });
Route::get('/task', [TaskController::class, 'index'])->name('task.index');

Route::get('/task/{id}', [TaskController::class, 'show'])->name('task.show');


Route::get('/add', [TaskController::class, 'add'])->name('add');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');


Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');


Route::put('/task/status/{id}', [TaskController::class, 'updateStatus'])->name('task.status');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
