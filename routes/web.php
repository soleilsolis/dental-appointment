<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', fn() => view('login'))->name('login');
Route::get('/register', fn() => view('register'))->name('register');
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/appointments', fn() => view('appointments'))->name('appointments');
Route::get('/settings', fn() => view('settings'))->name('settings');
