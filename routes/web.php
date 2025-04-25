<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
 return view('welcome');
});
Route::resource('products', ProductController::class);
use App\Http\Controllers\AuthController;

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');