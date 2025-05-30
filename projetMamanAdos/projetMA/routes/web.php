<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('landing');
// });

Route::get('/', function () {
    return view('pages.landing');
});


// Route POST pour la modal ou formulaire
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');