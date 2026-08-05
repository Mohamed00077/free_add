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
use App\Http\Controllers\GoogleController;
use App\Models\User;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');



// Rechercher une annonce
Route::get('/search', [AdController::class, 'search'])->name('ads.search');



// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');




// Login / Logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');



// Dashboard
Route::get('/dashboard', function () {
    $search = request('search');
   $ads = $search
    ? \App\Models\Ad::where('user_id', auth()->id())
                    ->search($search)
                    ->latest()->get()
    : \App\Models\Ad::where('user_id', auth()->id())->latest()->get();
    return view('dashboard', compact('ads', 'search'));
})->middleware(['auth', 'verified'])->name('dashboard');




// Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});





// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $nombre_annonce = \App\Models\Ad::count();
        $nombre_users = \App\Models\User::count();
        $annonce_recentes =\App\Models\Ad::where('created_at', '>=', now()->subDays(7))->count();
        $users = \App\Models\User::withCount('ads')->latest()->get();
        $search = request('search');
        $ads = $search
            ? \App\Models\Ad::search($search)->latest()->get()
            : \App\Models\Ad::latest()->get();
        return view('admin', compact('ads', 'search', 'nombre_annonce', 'nombre_users', 'annonce_recentes', 'users'));
        
    })->name('index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show_admin')->defaults('view', 'ads.show_admin');
});





// Email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');







// Ads
Route::get('/ads/home/{ad}', [AdController::class, 'show'])->name('ads.show_home')->defaults('view', 'ads.show_home');
Route::resource('ads', AdController::class);
