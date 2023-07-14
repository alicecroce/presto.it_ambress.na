<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Models\User;

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
Route::get('adv/{adv}/edit', [AdvController::class, 'edit'])->name('adv.edit');

Route::get('/ricerca/adv', [FrontController::class, 'searchAdvs'])->name('advs.search');

//Route revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{adv}', [RevisorController::class, 'acceptAdv'])->middleware('isRevisor')->name('revisor.accept_adv');
Route::patch('/accetta/annuncio-rifiutato/{adv}', [RevisorController::class, 'acceptRejectedAdv'])->middleware('isRevisor')->name('revisor.acceptRejected_adv');
Route::patch('/rifiuta/annuncio/{adv}', [RevisorController::class, 'rejectAdv'])->middleware('isRevisor')->name('revisor.reject_adv');
Route::get('/contattaci', [RevisorController::class, 'contactUs'])->middleware('auth')->name('contactus.revisor');
Route::post('/salva/contatto', [RevisorController::class, 'saveContact'])->name('savecontact.revisor');
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/richiesta/revisore/rifiutati', [RevisorController::class, 'not_accepted'])->name('rejected');


//AREA USER PROFILE
Route::get('/profilo', [UserController::class, 'index'])->name('user_profile.index');
Route::get('/profilo/edit', [UserController::class, 'edit'])->name('user_profile.edit');
Route::delete('/profilo/elimina', [UserController::class, 'destroy'])->name('user_profile.destroy');

//SELEZIONE MULTILINGUA

Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

//SOCIALITE


//ERRORS 
Route::get('/404_mancave', function () {
    return view('errors.404');
})->name('mancave');

Route::get('/403_lotr', function () {
    return view('errors.403');
})->name('lotr');

Route::get('/500_mrpotato', function () {
    return view('errors.500');
})->name('mrpotato');

//SOCIALITE
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('socialite.login');

Route::get('/login/github/callback', function () {
    $git_user = Socialite::driver('github')->stateless()->user();
    if ($git_user) {
        $user = User::create([
            'email' => $git_user->email,
            'name' => explode(" ", $git_user->name)[0],
            'surname' => explode(" ", $git_user->name)[1],
            'password' => bcrypt(''), //cripta la pass
        ]);
        Auth::login($user);
        return redirect('/');
    } else {
        return redirect('/404_mancave');
    };
    // $user->token
});
