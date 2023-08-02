<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InputFormController;
use App\Http\Controllers\ResultController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/input-form', function () {
    return view('input_form');
})->middleware(['auth', 'verified'])->name('input_form');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/handle-input-form', [InputFormController::class, 'handleInputForm'])->name('input_form.handle');
    Route::get('/result', [ResultController::class, 'getAll'])->name('result.all');
});

require __DIR__.'/auth.php';
