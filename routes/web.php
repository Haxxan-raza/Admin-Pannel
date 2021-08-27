<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;
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
})->middleware('auth');

//admin main Home route
Route::get('admins', function () {
    return view('admin.master');
})->middleware('auth');
// Route::get('registerform',[AddController::class,'registerForm']);
 
//add City route
Route::get('addcity',[AddController::class,'show'])->middleware('auth');
Route::post('save_city',[AddController::class,'citystore'])->middleware('auth');

//Registeration Form for Profile Route
Route::get('registerform',[AddController::class,'registerForm'])->middleware('auth');
Route::post('save_register',[AddController::class,'saveProfile'])->middleware('auth');

//disPlay View Record route
Route::get('recorddisply',[AddController::class,'recordDisply'])->middleware('auth');

//add Age Route
Route::get('addages',[AddController::class,'showAge'])->middleware('auth');
Route::post('save_age',[AddController::class,'ageStore'])->middleware('auth');

// Route::view('saved_register','register');
Route::get('editprofile/{id}',[AddController::class,'editProfile']);
Route::post('updateprofile/{id}',[AddController::class,'updateProfile'])->name('updateprofile');

//delete data route
// Route::get('deleteprofile/{id}',[AddController::class, 'destroy'])->name('deleteprofile');
Route::delete('deleterecord/{id}', [AddController::class, 'destroy'])->name('deleterecord');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
