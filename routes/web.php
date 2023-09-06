<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\ZchoisirSujetController;

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
});

 Route::resource('sujets',SujetController::class)->middleware(['auth', 'verified']);

// effectuer choix sujet
Route::get('/choix', [ZchoisirSujetController::class, 'index'])->name('choix.index')->middleware(['auth', 'verified']);
Route::post('/choix', [ZchoisirSujetController::class, 'store'])->name('choix.store')->middleware(['auth', 'verified']);;
Route::get('/choix/{sujet}/create', [ZchoisirSujetController::class, 'create'])->name('choix.create');

// afficher tous les choix
//  Route::get('Choix', [ZchoisirSujetController::class, 'indexMesChoix'])->name('choix.mesChoix')->middleware(['auth', 'verified']);;

// afficher mon/mes choix
Route::get('mesChoix', [ZchoisirSujetController::class, 'indexMesChoix'])->name('choix.mesChoix')->middleware(['auth', 'verified']);;

// valide un sujet SujetController
Route::patch('/choix/{choix}/valider', [ZchoisirSujetController::class,'validerChoix'])->name('choix.valider');

// affocher les sujets à valider par un professeur
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('sujetsP', [SujetController::class, 'indexPrSujet'])->name('choix.sujetsP');
});


//  chercher les sujets par filiere
 Route::controller(SujetController::class)->group(function () {
    Route::get('filiere/{name}/sujets', 'index')->name('sujets.filiere')->middleware(['auth', 'verified']);
});


// valide un sujet SujetController
Route::patch('/sujets/{sujet}/valider', [SujetController::class,'validerSujet'])->name('sujets.valider');


require __DIR__.'/auth.php';
