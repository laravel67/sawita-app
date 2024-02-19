<?php

use App\Http\Controllers\AddlistController;
use App\Http\Controllers\AnalizeController;
use App\Http\Controllers\AnalizedController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\SettController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/dashboard/pupuk', PupukController::class)->names('pupuk');
Route::resource('/dashboard/categories', CategoryController::class)->names('category')->except('show');
Route::resource('/dashboard/gardens', GardenController::class)->names('garden');
Route::resource('/dashboard/results', AnalizedController::class)->names('result');
Route::resource('/dashboard/myprofile', ProfileController::class)->names('profile');
Route::resource('dashbaord/guides', GuideController::class)->names('guide');
// Jadwal
Route::resource('/dashboard/jadwal', JadwalController::class)->names('jadwal');
Route::post('/dashboard/generate', [AddlistController::class, 'generating'])->name('generate');
Route::delete('/jadwal/{gardenId}', [SettController::class, 'destroy'])->name('deletes');
// Analisis ROUTERS
Route::get('/dashboar/analize/start', [AnalizeController::class, 'index'])->name('analize.index');
Route::post('/dashboar/analize/results', [AnalizeController::class, 'analize'])->name('process.analize');
