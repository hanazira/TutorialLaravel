<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|TEMPAT ROUTE LOCALHOST KITA, cth ==> http://127.0.0.1:8000/helloworld

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/helloworld', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index') ;       //akan kluar word yg ada di page index.blade.php
})->name ('home');

Route::get('/about', function () {
    return view('about');       //akan kluar word yg ada di page about.blade.php
    // echo 'about me';         //akan kluar word yg ada kt situ
    // dd ('about');            //dum and die for debugging
})->name ('about');

Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task', [TaskController::class, 'store' ])->name('task.store');

Route::get('/', [TaskController::class , 'index'])->name('task.index');
Route::get('/task/{tasks}', [TaskController::class, 'show'])->name('tasks.show');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');