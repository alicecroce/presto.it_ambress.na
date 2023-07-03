<?php

use App\Http\Controllers\AdvController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
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

Route::get('/', [CategoryController::class, 'index'])->name('welcome');

Route::get('/categoria/{category}', [CategoryController::class, 'categoryFilter'])->name('categoryshow');

Route::resource('adv', AdvController::class);

Route::get('/ricerca/adv', [FrontController::class, 'searchAdvs'])->name('advs.search');

//Route revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('/accetta/annuncio/{adv}', [RevisorController::class, 'acceptAdv'])->name('revisor.accept_adv'); //accetta
Route::patch('/rifiuta/annuncio/{adv}', [RevisorController::class, 'rejectAdv'])->name('revisor.reject_adv');//rifiuta