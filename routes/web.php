<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FMSAuthController;

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



/**Login page */
Route::get('/', [FMSAuthController::class, 'login'])->middleware('alreadyLoggedIn');

 /**Registration page or Form */
 Route::get('/add_user', [FMSAuthController::class, 'add_user']);
 Route::post('/register_user', [FMSAuthController::class, 'registerUser'])->name('register_user'); 
 Route::post('/login_user', [FMSAuthController::class, 'loginUser'])->name('login_user');
 Route::get('/AcadHead_dashboard', [FMSAuthController::class, 'dashboard'])->middleware('IsLoggedIn');
 Route::get('/logout', [FMSAuthController::class, 'logout']);
 