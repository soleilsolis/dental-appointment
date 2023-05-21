<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Models\Appointment;
use App\Models\Condition;
use App\Models\Modification;
use App\Models\ToothType;
use Illuminate\Support\Facades\Mail;
use App\Mail\Schedule;
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
    Route::get('/forgot', fn() => view('forgot-password'));
    Route::get('/test', fn() => view('test'));

    Route::get('/reset-password/{token}', fn($token) => view('reset-password', [
        'token' => $token,
        'email' => $_GET['email']
    ]));

}); 

Route::middleware('auth')->group(function() {
    Route::get('setup', fn() => view('setup'))->middleware('not.setup');
    
    Route::middleware('setup')->group(function () {
        Route::get('/home', fn() => redirect('/appointments'))->name('home');
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments');
        Route::get('/settings', fn() => view('settings'))->name('settings');
        Route::get('/appointments/print',  [AppointmentController::class, 'print'])->name('print');
        Route::get('/appointments/list',  [AppointmentController::class, 'list'])->name('list');

        Route::get('/appointment/{id}', function ($id){
            $appointment = Appointment::find($id);
            $toothTypes = ToothType::all();
            $conditions = Condition::all();
            $modifications = Modification::all();
            
            return view('appointment-view', compact('appointment', 'toothTypes', 'conditions','modifications'));
        })->where('id', '[0-9]+');
    });

    Route::middleware('dentist')->group(function() {
        Route::get('/services', [ServiceController::class, 'index'])->name('services');
        Route::get('/home', fn() => view('home'))->name('home');

        Route::get('/users', fn() => view('users', [UserController::class, 'index']))->name('users');
        Route::get('/user/new', fn() => view('user-new'))->name('user-new');
        
        Route::get('/user/{id}', function($id){
            $user = User::find($id);
            return view('user-view', compact('user'));
        })->name('user')->where('id', '[0-9]+');
    });
});
