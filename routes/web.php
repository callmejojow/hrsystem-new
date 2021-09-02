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

Route::resources([
    'profiles' => ProfileController::class,
    'users' => UserController::class,
]);


Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

    Route::view('profile','profile')->name('profile');
    Route::put('profile',[ProfileController::class,'update'])->name('profile.update');

    Route::get('/staff',[UserController::class,'index'])->name('staff.index');

    Route::get('users/{user}',[UserController::class,'show'])->name('profile.show')
    ->missing(function(){
        return response()->view('profile.notfound');
    });

    Route::patch('users/{user}',[UserController::class,'update'])->name('user.update');

    Route::post('create',[UserController::class,'store'])->name('user.store');

    Route::get('create', function () {
    return view('create');
    })->name('create');
    
});

    

require __DIR__.'/auth.php';

