<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KonsultasiController;
// use App\Http\Controllers\KomentarController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\IndexKonsultasiController;

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

Route::get('/login', [LoginController::class, 'getLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'getLogin']);


Route::get('/', function(){
    return view('home.index');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('about', [AboutController::class, 'about'])->name('about');

Route::resource('aboutclinic', ClinicController::class);
Route::resource('konsultasi', KonsultasiController::class)->middleware('auth');
    Route::patch('konsultasi/{konsultasi}/terima',[KonsultasiController::class,'terima'])->name('konsultasi.terima');
    Route::patch('konsultasi/{konsultasi}/tolak',[KonsultasiController::class,'tolak'])->name('konsultasi.tolak');

Route::resource('saran', SaranController::class)->middleware('auth');
Route::resource('jadwal', JadwalController::class);