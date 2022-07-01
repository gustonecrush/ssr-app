<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use App\Models\Admin;
use App\Models\Surat;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('index', [
        "title" => "Home",
    ]);
})->middleware(['guest', 'guest:admin']);

Route::get('/users', function() {
    return view('users', [
        "title" => "Users",
    ]);
})->name('users')->middleware(['guest', 'guest:admin']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(['guest', 'guest:admin']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/signup', [RegisterController::class, 'index'])->middleware(['guest', 'guest:admin']);
Route::post('/signup', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/beralih-akun', [LoginController::class, 'beralih_akun']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/opsi', [DashboardController::class, 'opsi'])->middleware('auth');

    Route::get('/isi-data', [DashboardController::class, 'isi_data'])->middleware('auth');
    Route::post('/isi-data', [DashboardController::class, 'store']);

    Route::get('/upload-berkas', [DashboardController::class, 'upload_berkas'])->middleware('auth');
    Route::post('/upload-berkas', [DashboardController::class, 'upload_data_berkas']);

    Route::get('/unduh-surat', [DashboardController::class, 'unduh_surat'])->middleware('auth');

    Route::get('/contact-person', function () {
        return view('contact-person',  [
            "title" => "Contact Person"
        ]);
    })->middleware('auth');

    Route::get('/ketentuan', function () {
        return view('ketentuan',  [
            "title" => "Ketentuan"
        ]);
    })->middleware('auth');

    Route::get('/edit', [DashboardController::class, 'edit'])->middleware('auth');
    Route::post('/edit', [DashboardController::class, 'update'])->middleware('auth');


    Route::get('/unduh-surat-rujukan', [DashboardController::class, 'pdf'])->middleware('auth');
    Route::get('send-email-pdf', [PDFController::class, 'index'])->middleware('auth');
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('login_admin')->middleware(['guest', 'guest:admin']);
Route::post('/admin/login', [AdminController::class, 'authenticate_admin']);

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'logout']);

    Route::get('/admin', [AdminController::class, 'index'])->middleware('auth:admin');
    Route::get('/admin/pasien', [AdminController::class, 'pasiens'])->middleware('auth:admin');
    Route::get('/admin/surat-rujukan', [AdminController::class, 'surats'])->middleware('auth:admin');
    Route::get('/admin/create-admin', [AdminController::class, 'create'])->middleware('auth:admin');
    Route::post('/admin/create-admin', [AdminController::class, 'store'])->middleware('auth:admin');
    Route::get('/admin/admin-ssr', [AdminController::class, 'admin'])->middleware('auth:admin');
    Route::post('/admin/delete-admin/{username}', [AdminController::class, 'destroy'])->middleware('auth:admin');
    Route::post('/admin/delete-surat', [AdminController::class, 'delete_surat'])->middleware('auth:admin');
    Route::post('/admin/delete-pasien', [AdminController::class, 'delete_pasien'])->middleware('auth:admin');
    Route::get('/admin/surat-rujukan/{id}', [AdminController::class, 'rujukan'])->middleware('auth:admin');
    Route::post('/admin/konfirm', [AdminController::class, 'konfirm'])->middleware('auth:admin');
    Route::get('/admin/content', [AdminController::class, 'content'])->middleware('auth:admin');
    Route::post('/admin/create-content', [AdminController::class, 'create_content'])->middleware('auth:admin');
    Route::post('/admin/delete-content', [AdminController::class, 'delete_content'])->middleware('auth:admin');
});

Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";
});

