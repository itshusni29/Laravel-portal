<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingRequestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/training-requests', [TrainingRequestController::class, 'index'])->name('training-requests.index');
Route::get('/training-requests/create', [TrainingRequestController::class, 'create'])->name('training-requests.create');
Route::post('/training-requests', [TrainingRequestController::class, 'store'])->name('training-requests.store'); // Perbaikan nama rute
Route::get('/training-requests/{id}/edit', [TrainingRequestController::class, 'edit'])->name('training-requests.edit');
Route::put('/training-requests/{id}', [TrainingRequestController::class, 'update'])->name('training-requests.update');
Route::delete('/training-requests/{id}', [TrainingRequestController::class, 'destroy'])->name('training-requests.destroy');
Route::post('/training-requests/approve-by-manager', [TrainingRequestController::class, 'approveByManager'])->name('approveByManager');
Route::post('/training-requests/approve-by-general-manager', [TrainingRequestController::class, 'approveByGeneralManager'])->name('approveByGeneralManager');
