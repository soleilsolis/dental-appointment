<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/testing', function () {
    echo 1;
});

Route::get('/', function () {
    return redirect('/login');
});

Route::post('/register', function(Request $request){
    User::create([
        'name' =>  $request->name,
        'email' =>  $request->email,
        //'email_verified_at' => now(),
        'password' => Hash::make($request->password),
        'first_name' => null,
        'last_name' => null,
        'type' => 'patient',
    ]);
});

Route::inertia('/about', 'AboutComponent');

Route::get('/login', fn() => view('login'))->name('login');
Route::get('/register', fn() => view('register'))->name('register');
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/appointments', fn() => view('appointments'))->name('appointments');
Route::get('/settings', fn() => view('settings'))->name('settings');

Route::get('/artisan/call/migrate', fn() => Artisan::call('migrate'));
//Route::get('/artisan/call/migrate/rollback', fn() => Artisan::call('migrate:rollback'));
Route::get('/artisan/call/storage/link', fn() => Artisan::call('storage:link'));
Route::get('/artisan/call/view/clear', fn() => Artisan::call('view:clear'));
