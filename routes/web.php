<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContentController;
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

Route::get('/home',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/content-metadata',[ContentController::class,'getMetadata'])->prefix('api')->middleware(['auth', 'verified'])->name('content.metadata');

Route::get('/tvshows',[DashboardController::class,'tvShows'])->middleware(['auth', 'verified'])->name('tvshows');
Route::get('/movies',[DashboardController::class,'movies'])->middleware(['auth', 'verified'])->name('movies');
Route::get('/cards',[CardController::class,'view'])->middleware(['auth', 'verified'])->name('cards');
Route::patch('/cards/update',[CardController::class,'update'])->middleware(['auth', 'verified'])->name('cards.update');
Route::delete('/cards/delete',[CardController::class,'delete'])->middleware(['auth', 'verified'])->name('cards.delete');
Route::patch('/cards/add',[CardController::class,'add'])->middleware(['auth', 'verified'])->name('cards.add');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
