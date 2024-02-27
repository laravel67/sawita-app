<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\MultiController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddlistController;
use App\Http\Controllers\AnalisiController;
use App\Http\Controllers\GalerryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| ADMIN ROUTERS
|--------------------------------------------------------------------------
| Ini Routes yang hanya bisa di akses user yang telah melakukan login dan rolenya Admin 
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    /*======================================================================================================*/
    //1.Route pengaturan Aplikasi
    Route::resource('/dashboard/setting', SettingController::class)->names('setting');
    /*======================================================================================================*/
    //2.Route untuk menambah user baru dan untuk & Generate Username dengan Jquery
    Route::resource('/dashboard/users', UserController::class)->names('users');
    Route::post('/check-username', function (Request $request) {
        $username = $request->input('username');
        $user = User::where('username', $username)->first();
        $response = ['exists' => $user !== null];
        return response()->json($response);
    });
    /*======================================================================================================*/
    //3.Route Untuk menambah kategori Jenis Pupuk
    Route::resource('/dashboard/categories', CategoryController::class)->names('category');
    /*======================================================================================================*/
});


/*
|--------------------------------------------------------------------------
| USER & ADMIN ROUTERS
|--------------------------------------------------------------------------
| Ini Routes yang hanya bisa di akses user yang sudah melakukakn Login
*/
/*======================================================================================================*/
// 1.Authentication Login
Route::get('/login', [LoginController::class, 'showForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
/*======================================================================================================*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/', HomeController::class)->names('home');
    // 2.Route Halaman Dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /*======================================================================================================*/
    // 3.Route Halaman Data Pupuk/Stok pupuk digudang (CRUD)
    Route::resource('/dashboard/pupuk', PupukController::class)->names('pupuk');
    Route::resource('/dasboard/stoks', StokController::class)->names('stok');
    /*======================================================================================================*/
    // 4.Route untuk Melakukan analisis tanah
    Route::resource('/dashboard/analisis', AnalisiController::class)->names('analisi');
    /*======================================================================================================*/
    // 5.Route Data Lahan (CRUD)
    Route::resource('/dashboard/gardens', GardenController::class)->names('garden');
    /*======================================================================================================*/
    // 6.Route Jadwal Pemupukan
    Route::resource('/dashboard/jadwal', JadwalController::class)->names('jadwal');
    Route::post('/dashboard/generate', [AddlistController::class, 'generating'])->name('generate');
    Route::delete('/jadwal/{gardenId}', [MultiController::class, 'destroy'])->name('deletes');
    Route::get('/about', [MultiController::class, 'show'])->name('about.show');
    /*======================================================================================================*/
    // 7.Panduan Mupuk
    Route::resource('dashbaord/guides', GuideController::class)->names('guide');
    /*======================================================================================================*/
    // 7.Account dan Profile user
    Route::resource('/dashboard/myprofile', AccountController::class)->names('account');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset.password');
    Route::resource('/dashboard/galeries', GalerryController::class)->names('galery');
    /*======================================================================================================*/
});
