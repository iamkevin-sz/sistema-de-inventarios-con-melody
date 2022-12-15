<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
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

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/registers', [RegisterController::class, 'create'])
//     ->middleware('guest')
//     ->name('registers.index');

// Route::post('/register', [RegisterController::class, 'store'])
//     ->name('register.store');



// Route::get('/logins', [SessionsController::class, 'create'])
//     ->middleware('guest')
//     ->name('logins.index');

// Route::post('/logins', [SessionsController::class, 'store'])
//     ->name('logins.store');

// Route::get('/logout', [SessionsController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('logins.destroy');

Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');


// Route::get('/admin', [AdminController::class, 'index'])
//     ->middleware('auth.admin')
//     ->name('admin.index');



Route::get('admin/home', [HomeController::class, 'index'] )->name('home');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

