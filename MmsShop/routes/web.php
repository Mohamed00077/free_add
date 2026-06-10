<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

//Rechercher une annonce
Route::get('/ads/search', [AdController::class, 'search'])->name('ads.search');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Login / Logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', function () {
    $search = request('search');
    $ads = $search
        ? \App\Models\Ad::where('user_id', auth()->id())
                        ->where(function($q) use ($search) {
                            $q->where('title', 'LIKE', "%{$search}%")
                              ->orWhere('category', 'LIKE', "%{$search}%")
                              ->orWhere('location', 'LIKE', "%{$search}%")
                              ->orWhere('price', 'LIKE', "%{$search}%");
                        })
                        ->latest()->get()
        : \App\Models\Ad::where('user_id', auth()->id())->latest()->get();
    return view('dashboard', compact('ads', 'search'));
})->middleware(['auth'])->name('dashboard');

// Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
Route::get('/', function () {
    $search = request('search');
    $ads = $search
        ? \App\Models\Ad::where('title', 'LIKE', "%{$search}%")
                        ->orWhere('category', 'LIKE', "%{$search}%")
                        ->orWhere('location', 'LIKE', "%{$search}%")
                        ->orWhere('price', 'LIKE', "%{$search}%")
                        ->latest()->get()
        : \App\Models\Ad::latest()->get();
    return view('admin', compact('ads', 'search'));
})->name('index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/ads/{ad}', [AdController::class, 'show_admin'])->name('ads.show_admin');
});


// Email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/search', [AdController::class, 'search'])->name('ads.search');
Route::resource('ads', AdController::class);
Route::get('/ads/{ad}/home', [AdController::class, 'show_home'])->name('ads.show_home');

// Ads
Route::resource('ads', AdController::class);