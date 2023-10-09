<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\ZchoisirSujetController;
use App\Http\Controllers\FicheSuivieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\MemoireController;

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
Route::post('/choix', [ZchoisirSujetController::class, 'store'])->name('choix.store')->middleware(['auth', 'verified']);
Route::get('/choix{sujet}/create', [ZchoisirSujetController::class, 'create'])->name('choix.create');
Route::get('/choix{choix}/show', [ZchoisirSujetController::class, 'show'])->name('choix.show');

// fiches de suivis
Route::get('/ficheSuivie', [FicheSuivieController::class, 'index'])->name('ficheSuivie.index')->middleware(['auth', 'verified']);
Route::get('/ficheSuivie{choix}/create', [FicheSuivieController::class, 'create'])->name('ficheSuivie.create')->middleware(['auth', 'verified']);
Route::post('/ficheSuivie', [FicheSuivieController::class, 'store'])->name('ficheSuivie.store')->middleware(['auth', 'verified']);

// commentaires
Route::get('/commentaires{ficheSuivie}/create', [CommentaireController::class, 'create'])->name('commentaires.create')->middleware(['auth', 'verified']);
Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store')->middleware(['auth', 'verified']);
Route::get('/commentaires', [CommentaireController::class, 'index'])->name('commentaires.index')->middleware(['auth', 'verified']);;

// memoires
Route::get('/memoires{choix}/create', [MemoireController::class, 'create'])->name('memoires.create')->middleware(['auth', 'verified']);
Route::post('/memoires', [MemoireController::class, 'store'])->name('memoires.store')->middleware(['auth', 'verified']);
Route::get('/memoires', [MemoireController::class, 'index'])->name('memoires.index');
Route::get('/memoires{memoire}/show', [MemoireController::class, 'show'])->name('memoires.show')->middleware(['auth', 'verified']);


// afficher tous les choix
//  Route::get('Choix', [ZchoisirSujetController::class, 'indexMesChoix'])->name('choix.mesChoix')->middleware(['auth', 'verified']);;

// afficher mon/mes choix
Route::get('mesChoix', [ZchoisirSujetController::class, 'indexMesChoix'])->name('choix.mesChoix')->middleware(['auth', 'verified']);;

Route::get('choixValide', [ZchoisirSujetController::class, 'choixValide'])->name('choix.choixValide')->middleware(['auth', 'verified']);;


// valide un choix 
Route::patch('/choix/{choix}/valider', [ZchoisirSujetController::class,'valideChoix'])->name('choix.valideChoix');

// affocher les sujets à valider par un professeur
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('sujetsP', [SujetController::class, 'indexPrSujet'])->name('choix.sujetsP');
});

// afficher mes etudiants ficheSuivie.mesEtudiants
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('mesEtudiants', [ZchoisirSujetController::class, 'mesEtudiants'])->name('choix.mesEtudiants');
});

// affocher les fiches de suivies d'un étudiant
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/ficheSuivie{etudiant}/', [FicheSuivieController::class, 'show1'])->name('ficheSuivie.show1');
});


//  chercher les sujets par filiere
 Route::controller(SujetController::class)->group(function () {
    Route::get('filiere/{name}/sujets', 'index')->name('sujets.filiere')->middleware(['auth', 'verified']);
});


// valide un sujet SujetController
Route::patch('/sujets/{sujet}/valider', [SujetController::class,'validerSujet'])->name('sujets.valider');


require __DIR__.'/auth.php';
