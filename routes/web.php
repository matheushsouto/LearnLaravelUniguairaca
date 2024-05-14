<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/contato', [ContactController::class, 'index']);
    Route::post('/contato/store', [ContactController::class, 'store'])->name('contato.store');
    Route::put('/contato/update', [ContactController::class, 'update'])->name('contato.update');
    Route::delete('/contato/delete/{id}', [ContactController::class, 'destroy'])
        ->name('contato.destroy');
    Route::get('/contato/decripty', [ContactController::class, 'decripty']);
    Route::post('/contato/send', [ContactController::class, 'enviarMensagem']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
