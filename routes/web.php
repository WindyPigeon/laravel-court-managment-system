<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Models\User;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', function () {
    return redirect('/home');
})->name('login');

Route::get('/home', function () {
    return view('/home');
})->middleware('auth.basic');

Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'store']
)->name('register');

/* Route::post('/register', function (Illuminate\Http\Request $request) {
    $user = App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => $request->password
    ]);
    $user->save();
    return view('auth.login');
})->name('register'); */