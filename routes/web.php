<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ReservationController;

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

Route::get('/login', [LoginController::class,'index'])->name('login');

Route::post('/login', [LoginController::class,'authenticate'])->name('login');

Route::get('/profile', [LoginController::class,'show'])->middleware('auth')->name('profile');

Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/register', [RegisterController::class,'index'])->name('register');

Route::post('/register', [RegisterController::class,'register'])->name('register');

Route::post('/home', function () {
    return view('home');
});

Route::get('/facilities', [FacilityController::class,'index'])->name('facilities.index');

Route::get('/facilities/create', [FacilityController::class,'create'])->name('facilities.create');

Route::post('/facilities', [FacilityController::class,'store'])->name('facilities.store');

Route::get('/facilities/{facility}', [FacilityController::class,'show'])->name('facilities.show');

Route::get('/facilities/{facility}/edit', [FacilityController::class,'edit'])->name('facilities.edit');

Route::put('/facilities/{facility}', [FacilityController::class,'update'])->name('facilities.update');

Route::delete('/facilities/{facility}', [FacilityController::class,'destroy'])->name('facilities.destroy');

Route::get('/reservations', [ReservationController::class,'index'])->name('reservations.index');

Route::get('/reservations/{facility}/create', [ReservationController::class,'create'])->name('reservations.create');

Route::post('/reservations', [ReservationController::class,'store'])->name('reservations.store');

Route::get('/reservations/{reservation}', [ReservationController::class,'show'])->name('reservations.show');

Route::get('/reservations/{reservation}/edit', [ReservationController::class,'edit'])->name('reservations.edit');

Route::put('/reservations/{reservation}', [ReservationController::class,'update'])->name('reservations.update');

Route::delete('/reservations/{reservation}', [ReservationController::class,'destroy'])->name('reservations.destroy');
