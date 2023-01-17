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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;      
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserController::class, 'show'])->name('profile');
	Route::get('/user/{id}', [UserController::class, 'user_details'])->name('user.profile');
	Route::post('/profile/{user}', [UserController::class, 'update'])->name('profile.update');
	Route::post('/avatar', [UserController::class, 'update_avatar'])->name('avatar.update');
	Route::get('/users', [UserController::class, 'index'])->name('users');
	Route::get('/category', [CategoryController::class, 'manageCategory'])->name('category');
	Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add.category');
	Route::post('update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
	Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});