<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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


Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

    Route::view('profile','profile')->name('profile');
    Route::put('profile',[ProfileController::class,'update'])->name('profile.update');

    Route::get('staff',[UserController::class,'index'])->name('staff.show');

    Route::get('users/{user}/show',[UserController::class,'show'])->name('profile.show')
    ->missing(function(){
        return view('profile.notfound');
    });
});

require __DIR__.'/auth.php';

