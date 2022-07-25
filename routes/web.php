<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/akun', [AkunController::class, 'index']) -> name('akun');

Route::get('/tambahakun', [AkunController::class, 'tambahakun']) -> name('tambahakun');
Route::post('/insertakun', [AkunController::class, 'insertakun']) -> name('insertakun');


Route::get('/dproyek', function () {
    return view('dproyek', [
        "title" => "Data Proyek"
    ]);
});

Route::get('/pproyek', function () {
    return view('pproyek', [
        "title" => "Perolehan Proyek"
    ]);
});

Route::get('/bmarketing', function () {
    return view('bmarketing', [
        "title" => "Biaya Marketing"
    ]);
});

Route::get('/bks', function () {
    return view('bks', [
        "title" => "Buku Kas Harian"
    ]);
});

Route::get('/bbbadm', function () {
    return view('bbbadm', [
        "title" => "Buku Besar Biaya Administrasi & Umum"
    ]);
});

Route::get('/user', function () {
    return view('user', [
        "title" => "User",
        "name" => "Ini merupakan halaman yang berisi data petugas",
        "ket" => "Silahkan SignUp jika ingin mengakses",
        "slog" => "Samalogi",
        "image" => "logo.png"
    ]);
});

Route::get('/login', [LoginController::class, 'index']);