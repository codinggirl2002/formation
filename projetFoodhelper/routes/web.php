<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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



Route::get('/', function () {
    return view('home');
});

//others pages
Route::get('/about', function () {
    return view('others.about');
});

Route::get('/contact', function () {
    return view('others.contact');
});

//logs

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);
//route vers le dashboard user
// Route::match(['get', 'post'], '/dashboard', function () {
//     return view('auth.dashboard');
// })->name('dashboard');

Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'index']
)->name('dashboard');


Route::get('/{user}/edit', [AuthController::class, 'edit']) -> name('auth.edit'); //pour afficher le formulaire de maj
Route::post('/{user}/edit', [AuthController::class, 'update']); //pour gerer le traitement d la maj

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'login']);
//dons 

Route::get('/baseauth', function () {
    return view('auth.baseauth');
});