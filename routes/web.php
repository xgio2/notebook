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

Route::get('/', function () {
    return view('welcome');

});

Route::get('/api/v1/notebook', [\App\Http\Controllers\NotebookController::class, 'index'])->name('notebook.index');

Route::post('/api/v1/notebook', [\App\Http\Controllers\NotebookController::class, 'store'])->name('notebook.store');

Route::get('/api/v1/notebook/create', [\App\Http\Controllers\NotebookController::class, 'create'])->name('notebook.create');

Route::get('/api/v1/notebook/{person}', [\App\Http\Controllers\NotebookController::class, 'show'])->name('notebook.show');

Route::get('/api/v1/notebook/{person}/edit', [\App\Http\Controllers\NotebookController::class, 'edit'])->name('notebook.edit');

Route::patch('/api/v1/notebook/{person}', [\App\Http\Controllers\NotebookController::class, 'update'])->name('notebook.update');

Route::delete('/api/v1/notebook/{person}', [\App\Http\Controllers\NotebookController::class, 'destroy'])->name('notebook.delete');

