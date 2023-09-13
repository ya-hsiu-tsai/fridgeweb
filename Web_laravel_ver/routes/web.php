<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FridgeController;
use App\Http\Controllers\AddFridgeController;
use App\Http\Controllers\ShowController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('add', [AddFridgeController::class, 'edit'])->name('add.fridge');
    Route::post('add', [AddFridgeController::class, 'store']);
    Route::get('show', [ShowController::class, 'edit'])->name('show.show-fridge');
});

Route::post('/selecttable', [FridgeController::class, 'selectTable'])->name('selecttable');
Route::get('/fridgedetail', [FridgeController::class, 'detail'])->name('fridgedetail');

require __DIR__.'/auth.php';
