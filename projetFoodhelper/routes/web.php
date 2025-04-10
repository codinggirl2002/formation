<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\demandeController;
use App\Http\Controllers\donation_userController;
use App\Http\Controllers\donationController;
use App\Http\Controllers\homeController;
use GuzzleHttp\Promise\Create;
use Termwind\Components\Dd;
use App\Models\AllUsers;
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



Route::get('/', [homeController::class, 'index'])->name('home');


//others pages
Route::get('/about', function () {
    return view('others.about');
})->name('about');

Route::get('/contact', [contactController::class, 'contact'])->name('contact');
Route::post('/contact', [contactController::class, 'envoyer']);

//Routes pour les operations de crud d'un utilisateur et son dashboard

Route::name('auth.')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');//afficher le formulaire d'inscription
    Route::get('/{user}/edit', [AuthController::class, 'edit']) -> name('edit'); //pour afficher le formulaire de maj
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); //afficher le formulaire de connexion
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');  //pour se deconnecter
    Route::get('/{user}/delete', [AuthController::class, 'delete'])->middleware(['auth'])->name('delete');//pour afficher la page de suppression d'un utilisateur
    Route::match(['get', 'post'], '/dashboarduser', [DashboardController::class, 'index']
    )->name('dashboarduser');//pour acceeder au dashboard utilisateur

});



Route::post('/register', [AuthController::class, 'register']); //pour gerer le traitement de l'inscription
Route::post('/{user}/edit', [AuthController::class, 'update']); //pour gerer le traitement d la maj
Route::post('/login', [AuthController::class, 'login']); //pour gerer le traitement de le connxion
Route::delete('/{user}', [AuthController::class, 'destroy'])->name('destroy');//pour supprimer un utilisateur

//dons  et demandes

Route::middleware(['auth'])->resource('donations',donationController::class);
Route::get('/donationslist', [donationController::class, 'donationList'])->name('donations.list');
Route::middleware(['auth'])->resource('demandes', demandeController::class);
Route::get('/demandes/create/{donationId}', [demandeController::class, 'create'])->name('demandes.create');
Route::middleware('auth')->group(function () {
    Route::delete('/demandes/{donationId}', [demandeController::class, 'destroy'])->name('demandes.destroy');
    Route::get('/demandes/{donationId}/edit', [demandeController::class, 'edit'])->name('demandes.edit');
    Route::put('/demandes/{donationId}', [demandeController::class, 'update'])->name('demandes.update');
});



// Routes d'authentification admin
Route::prefix('admin')->group(function () {
    // Afficher le formulaire de connexion
    Route::get('/login', [adminController::class, 'showLoginForm'])->name('admin.login');
    // Traiter la connexion
    Route::post('/login', [adminController::class, 'login'])->name('admin.login.submit');
    // Afficher le formulaire d'inscription
    Route::get('/register', [adminController::class, 'showRegistrationForm'])->name('admin.register');
    // Traiter l'inscription
    Route::post('/register', [adminController::class, 'register'])->name('admin.register.submit');
    //pour supprimer un administrateur
    Route::delete('/{admin}', [adminController::class, 'destroy'])->name('admin.destroy');

});

// Dashboard protégé pour l'administrateur
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [adminController::class, 'index'])->name('admin.dashboardstats');
    Route::get('/dashboard/gestionusers', [adminController::class, 'gestionusers'])->name('admin.dashboardgestionusers');
    Route::get('/dashboard/gestiondons', [adminController::class, 'gestiondons'])->name('admin.dashboardgestiondons');
    Route::get('/dashboard/gestiondemandes', [adminController::class, 'gestiondemandes'])->name('admin.dashboardgestiondemandes');
    Route::get('/dashboard/account', [adminController::class, 'account'])->name('admin.account');
    // Afficher le formulaire d'attribution pour un don donné
    Route::get('/donations/{donationId}/assign', [adminController::class, 'assignForm'])->name('admin.donations.assignForm'); 
    // Traiter l'attribution via une requête POST (ou PUT selon préférence)
    Route::post('/donations/{donationId}/assign', [adminController::class, 'assign'])->name('admin.donations.assign');
    // Traiter la deconnexion
    Route::post('/logout', [adminController::class, 'logout'])->name('admin.logout');
    //pour afficher la page de suppression d'un administrateur
    Route::get('/{admin}/delete', [adminController::class, 'delete'])->name('admin.delete');

});

// Route::get('/test-guards', function () {
//     return config('auth.guards');
// });

