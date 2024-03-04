<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HidupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserPetugasDashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduKategoriController;
use App\Http\Controllers\TranksaksiController;
use App\Http\Controllers\PenjualanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/user/{users}', function (User $users) {
//     return $users->namalengkap;
// });
Route::get('/', [HidupController::class, 'index'])->name('/');
Route::get('/about', [HidupController::class, 'about']);

Route::get('/login', [UserController::class, 'LoginForm'])->name('login.form')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'RegisterForm'])->name('register.form')->middleware(['auth', 'admincuy']);
Route::post('/register', [UserController::class, 'register'])->name('register')->middleware(['auth', 'admincuy']);

Route::get('/profile', [UserProfileController::class, 'ProfileIndex'])->name('profile.home')->middleware('auth');;
Route::post('/profile', [UserProfileController::class, 'profile'])->name('profile')->middleware('auth');;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/profile', [UserProfileController::class, 'ProfileIndex'])->name('profile.index')->middleware('auth');;
Route::post('/dashboard/profile', [UserProfileController::class, 'profile'])->name('profile')->middleware('auth');;

Route::resource('/dashboard/produk', ProdukController::class)->middleware('auth');
Route::resource('/dashboard/kategori', ProduKategoriController::class)->middleware('auth');
Route::resource('/dashboard/pelanggan', PelangganController::class)->middleware(['auth','petugascuy']);
Route::resource('/dashboard/tranksaksi', TranksaksiController::class)->middleware(['auth','petugascuy']);
Route::resource('/dashboard/penjualan', PenjualanController::class)->middleware(['auth','petugascuy']);
Route::resource('/dashboard/user', UserPetugasDashboardController::class)->middleware(['auth','admincuy']);

Route::get('/testcuy', function(){
    return view('about');
})->middleware('admincuy');

Route::get('/tes', function(){
    return view('vangkedashboard');
});