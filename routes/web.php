<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\AppointmentController;
use App\Models\Appointment;

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
    return redirect('/login');
});

Route::inertia('/about', 'AboutComponent');

Route::middleware('guest')->group(function() {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::get('/register', fn() => view('register'))->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('/home', fn() => view('home'))->name('home');
    
    Route::get('/appointments', fn() => view('appointments', [AppointmentController::class, 'index']))->name('appointments');
    
    Route::get('/settings', fn() => view('settings'))->name('settings');

    Route::middleware('admin')->group(function() {
        Route::get('/services', fn() => view('services'))->name('services');
        Route::get('/users', fn() => view('users', [UserController::class, 'index']))->name('users');
    });
});
