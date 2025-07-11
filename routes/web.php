<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EditProfileController;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfNotSignedIn;

Route::get('/display', [HomeController::class, 'display_rent']);

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/about', [HomeController::class, 'about']);
Route::get('/verification', [HomeController::class, 'verify']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth');
Route::get('/car', [HomeController::class, 'cars']);
Route::get('/car', [GetController::class, 'index2']);
Route::get('/display', [GetController::class, 'index3'])->middleware('auth');
Route::get('/verification_code', [HomeController::class, 'VerificationCode']);


// Session
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//Register
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::patch('/users/{user}', [RegisterController::class, 'update']);
Route::get('/users/{user}/edit', [RegisterController::class, 'edit']);
Route::post('/verify_code', [RegisterController::class, 'code']);

// Rent
Route::get('/rent', [RentController::class, 'create'])->middleware('auth');
Route::post('/rent', [RentController::class, 'store'])->middleware('auth');

// API Route
Route::get('/admin/cars', [CarController::class, 'showCarPage']);
Route::get('/admin/fetch-cars', [CarController::class, 'fetchCarsAjax']);

Route::get('/rental/{rent}/contract', [ContractController::class, 'generateContract'])->name('contract.generate');
Route::get('/rental/{rent}/contract/download', [ContractController::class, 'downloadContract'])->name('contract.download');

// Edit Profile
Route::patch('/userss/{user}', [EditProfileController::class, 'update']);
Route::get('/users/{user}/profile', [EditProfileController::class, 'edit']);

// Admin 
Route::get('/loginadmin', [HomeController::class, 'login']);
Route::post('/loginasadmin', [AdminController::class, 'store']);
Route::post('/logoutasadmin', [AdminController::class, 'destroy']);
Route::post('/cars', [CarController::class, 'store'])->middleware(RedirectIfNotSignedIn::class);

Route::get('/create', [GetController::class, 'index'])->middleware(RedirectIfNotSignedIn::class);

Route::patch('/cars/{car}', [CarController::class, 'update'])->middleware(RedirectIfNotSignedIn::class);

Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->middleware(RedirectIfNotSignedIn::class);

Route::delete('/cars/{car}', [CarController::class, 'destroy'])->middleware(RedirectIfNotSignedIn::class);

Route::get('/display-rented', [GetController::class, 'user'])->middleware(RedirectIfNotSignedIn::class);

Route::patch('/users/{rent}', [AdminController::class, 'update'])->middleware(RedirectIfNotSignedIn::class);
Route::get('/users/{rent}/admin', [AdminController::class, 'edit'])->middleware(RedirectIfNotSignedIn::class);


