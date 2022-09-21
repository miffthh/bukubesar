<?php

use App\Exports\BmarketingExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BksController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BbbadmController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DProyekController;
use App\Http\Controllers\PproyekController;
use App\Http\Controllers\Select2Controller;
use App\Http\Controllers\BmarketingController;

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
        "title" => "Dashboard"
    ]);
})->middleware('auth');


Route::group(['middleware' => ['auth','hakakses:Admin']], function(){
    //Data Akun
    Route::get('/akun',  [AkunController::class, 'index'])->name('akun')->middleware('auth');
    Route::get('/tambahakun', [AkunController::class, 'tambahakun'])->name('tambahakun')->middleware('auth');
    Route::post('/insertakun', [AkunController::class, 'insertakun'])->name('insertakun')->middleware('auth');    

    //Data Proyek
    Route::get('/dproyek', [DProyekController::class, 'index'])->name('dproyek')->middleware('auth');
    Route::get('/tambahdatadp', [DProyekController::class, 'tambahdatadp'])->name('tambahdatadp')->middleware('auth');
    Route::post('/insertdatadp', [DProyekController::class, 'insertdatadp'])->name('insertdatadp')->middleware('auth');

    //Perolehan Proyek
    Route::get('/pproyek', [PproyekController::class, 'index'])->name('pproyek')->middleware('auth');
    Route::get('/tambahdatapproyek', [PproyekController::class, 'tambahdatapproyek'])->name ('tambahdatapproyek')->middleware('auth');
    Route::post('/insertdatapproyek', [PproyekController::class, 'insertdatapproyek'])->name ('insertdatapproyek')->middleware('auth');
    Route::get('/tampilkandatapproyek/{id}', [PproyekController::class, 'tampilkandatapproyek']) -> name ('tampilkandatapproyek')->middleware('auth');
    Route::post('/updatedatapproyek/{id}', [PproyekController::class, 'updatedatapproyek'])->name('updatedatapproyek')->middleware('auth');
    Route::get('/deleted/{id}', [PproyekController::class, 'delete'])->name('deleted')->middleware('auth');
    //Export PDF
    Route::get('/exportpdf', [PproyekController::class, 'exportpdf'])->name('exportpdf')->middleware('auth');
    //Export Excel
    Route::get('/exportexcel', [PproyekController::class, 'exportexcel'])->name('exportexcel')->middleware('auth');
    

    //Biaya Marketing
    Route::get('/bmarketing', [BmarketingController::class, 'index'])->name('bmarketing')->middleware('auth');
    Route::get('/tambahdatabm', [BmarketingController::class, 'tambahdatabm'])->name('tambahdatabm')->middleware('auth');
    Route::post('/insertdatabm', [BmarketingController::class, 'insertdatabm'])->name('insertdatabm')->middleware('auth');
    Route::get('/tampilkandatabm/{id}', [BmarketingController::class, 'tampilkandatabm']) -> name ('tampilkandatabm')->middleware('auth');
    Route::post('/updatedatabm/{id}', [BmarketingController::class, 'updatedatabm'])->name('updatedatabm')->middleware('auth');
    Route::get('/hapus/{id}', [BmarketingController::class, 'delete'])->name('hapus')->middleware('auth');
    //Export PDF
    Route::get('/exporttpdf', [BmarketingController::class, 'exporttpdf'])->name('exporttpdf')->middleware('auth');
    //Export Excel
    Route::get('/exporttexcel', [BmarketingController::class, 'exporttexcel'])->name('exporttexcel')->middleware('auth');

    //Buku Kas Harian
    Route::get('/bks', [BksController::class, 'index'])->name('bks')->middleware('auth');
    Route::get('/tambahdatabks', [BksController::class, 'tambahdatabks'])->name('tambahdatabks')->middleware('auth');
    Route::post('/insertdatabks', [BksController::class, 'insertdatabks'])->name('insertdatabks')->middleware('auth');
    Route::get('/tampilkandatabks/{id}', [BksController::class, 'tampilkandatabks']) -> name ('tampilkandatabks')->middleware('auth');
    Route::post('/updatedatabks/{id}', [BksController::class, 'updatedatabks'])->name('updatedatabks')->middleware('auth');
    Route::get('/deletee/{id}', [BksController::class, 'delete'])->name('deletee')->middleware('auth');
    //Export PDF
    Route::get('/exporrtpdf', [BksController::class, 'exporrtpdf'])->name('exporrtpdf')->middleware('auth');
    //Export Excel
    Route::get('/exporrtexcel', [BksController::class, 'exporrtexcel'])->name('exporrtexcel')->middleware('auth');
    //AutoComplete
    // Route::get('/cari', 'Select2Controller@loadData');
    Route::get('/autocomplate', [BksController::class, 'autocomplate'])->name('autocomplate')->middleware('auth');
    Route::get('/cari', [BksController::class, 'cari'])->name('cari')->middleware('auth');
    // Route::get('/bkss/{id}', [BksController::class, 'bkss'])->name('bkss')->middleware('auth');

    //BB Biaya Adm & Umum
    Route::get('/bbbadm', [BbbadmController::class, 'index'])->name('bbbadm')->middleware('auth');
    Route::get('/tambahdatabbbadm', [BbbadmController::class, 'tambahdatabbbadm'])->name('tambahdatabbbadm')->middleware('auth');
    Route::post('/insertdatabbbadm', [BbbadmController::class, 'insertdatabbbadm'])->name('insertdatabbbadm')->middleware('auth');
    Route::get('/tampilkandatabbbadm/{id}', [BbbadmController::class, 'tampilkandatabbbadm']) -> name ('tampilkandatabbbadm')->middleware('auth');
    Route::post('/updatedatabbbadm/{id}', [BbbadmController::class, 'updatedatabbbadm'])->name('updatedatabbbadm')->middleware('auth');
    Route::get('/deleteee/{id}', [BbbadmController::class, 'delete'])->name('deleteee')->middleware('auth');
    //Export PDF
    Route::get('/expoortpdf', [BbbadmController::class, 'expoortpdf'])->name('expoortpdf')->middleware('auth');
    //Export Excel
    Route::get('/expoortexcel', [BbbadmController::class, 'expoortexcel'])->name('expoortexcel')->middleware('auth');

    

    //Data User
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
    Route::get('/tambahuser', [UserController::class, 'tambahuser'])->name('tambahuser')->middleware('auth');
    Route::get('/tampilkandatauser/{id}', [UserController::class, 'tampilkandatauser']) -> name ('tampilkandatauser')->middleware('auth');    
    Route::post('/updatedatauser/{id}', [UserController::class, 'updatedatauser'])->name('updatedatauser')->middleware('auth');
    Route::post('/tambahdatauser', [UserController::class, 'tambahdatauser'])->name ('tambahdatauser');
    Route::get('/deleate/{id}', [UserController::class, 'delete'])->name('deleate')->middleware('auth');    
});


Route::group(['middleware' => ['auth','hakakses:Admin,Operator']], function(){
    //Data Akun
    Route::get('/akun', [AkunController::class, 'index'])->name('akun')->middleware('auth');
    
    //Data Proyek
    Route::get('/dproyek', [DProyekController::class, 'index'])->name('dproyek')->middleware('auth');

    //Perolehan Proyek
    Route::get('/pproyek', [PproyekController::class, 'index'])->name('pproyek')->middleware('auth');
    // Export PDF
    Route::get('/exportpdf', [PproyekController::class, 'exportpdf'])->name('exportpdf')->middleware('auth');
    //Export PDF Per Tanggal
    Route::get('/cetakkkkform', [PproyekController::class, 'cetakkkkform'])->name('cetakkkkform')->middleware('auth');
    Route::get('/cetakkkkpdf', [PproyekController::class, 'cetakkkkpdf'])->name('cetakkkkpdf')->middleware('auth');
    //Export Excel
    Route::get('/exportexcel', [PproyekController::class, 'exportexcel'])->name('exportexcel')->middleware('auth');
    //Filter Tanggal
    Route::get('/periodes', [PproyekController::class, 'periodes'])->name('periodes')->middleware('auth');    
        
    //Biaya Marketing
    Route::get('/bmarketing', [BmarketingController::class, 'index'])->name('bmarketing')->middleware('auth');
    //Export PDF
    Route::get('/exporttpdf', [BmarketingController::class, 'exporttpdf'])->name('exporttpdf')->middleware('auth');
    //Export PDF Per Tanggal
    Route::get('/cetakform', [BmarketingController::class, 'cetakform'])->name('cetakform')->middleware('auth');
    Route::get('/cetakpdf', [BmarketingController::class, 'cetakpdf'])->name('cetakpdf')->middleware('auth');
    //Export Excel
    Route::get('/exporttexcel', [BmarketingController::class, 'exporttexcel'])->name('exporttexcel')->middleware('auth');
    Route::get('/indeex', [BmarketingController::class, 'indeex'])->name('indeex')->middleware('auth');
    Route::get('/liat', [BmarketingController::class, 'liat'])->name('liat')->middleware('auth');
    
    //Filter Tanggal
    Route::get('/periodeee', [BmarketingController::class, 'periodeee'])->name('periodeee')->middleware('auth');    


    //Buku Kas Harian
    Route::get('/bks', [BksController::class, 'index'])->name('bks')->middleware('auth');
    //Export PDF
    Route::get('/exporrtpdf', [BksController::class, 'exporrtpdf'])->name('exporrtpdf')->middleware('auth');
    //Export PDF Per Tanggal
    Route::get('/cetakkform', [BksController::class, 'cetakkform'])->name('cetakkform')->middleware('auth');
    Route::get('/cetakkpdf', [BksController::class, 'cetakkpdf'])->name('cetakkpdf')->middleware('auth');
    //Export Excel
    Route::get('/exporrtexcel', [BksController::class, 'exporrtexcel'])->name('exporrtexcel')->middleware('auth');
    //Filter Tanggal
    Route::get('/periodee', [BksController::class, 'periodee'])->name('periodee')->middleware('auth');    

    //BB Biaya Adm & Umum
    Route::get('/bbbadm', [BbbadmController::class, 'index'])->name('bbbadm')->middleware('auth');

    Route::get('/bbadm', [BbbadmController::class, 'indexx'])->name('bbadm')->middleware('auth');

    //Export PDF
    Route::get('/expoortpdf', [BbbadmController::class, 'expoortpdf'])->name('expoortpdf')->middleware('auth');
    //Export PDF Per Tanggal
    Route::get('/cetakkkform', [BbbadmController::class, 'cetakkkform'])->name('cetakkkform')->middleware('auth');
    Route::get('/cetakkkpdf', [BbbadmController::class, 'cetakkkpdf'])->name('cetakkkpdf')->middleware('auth');
    //Export Excel
    Route::get('/expoortexcel', [BbbadmController::class, 'expoortexcel'])->name('expoortexcel')->middleware('auth');    
    //Filter Tanggal
    Route::get('/periode', [BbbadmController::class, 'periode'])->name('periode')->middleware('auth');    

    //Profil
    // Route::get('/profil/{id}', 'ProfilController@show');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil')->middleware('auth');
    Route::post('/editprofil', [ProfilController::class, 'editprofil'])->name('editprofil')->middleware('auth');
    Route::post('/updatedataprofil/{id}', [ProfilController::class, 'updatedataprofil'])->name('updatedataprofil')->middleware('auth');

    
});


//Login
Route::get('/login', [LoginController::class, 'login'])->name ('login');
Route::post('/loginproses', [LoginController::class, 'loginproses','authenticate'])->name ('loginproses');

//Register
Route::get('/register', [LoginController::class, 'register'])->name ('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name ('registeruser');



//Logout
Route::get('/logout', [LoginController::class, 'logout']) -> name ('logout');





