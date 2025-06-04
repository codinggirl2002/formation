<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Affiche la landing page
Route::get('/', [RegistrationController::class, 'showForm'])->name('landing');

// Traite le formulaire d'inscription (POST)
Route::post('/inscription', [RegistrationController::class, 'store'])
    ->name('registration.store');