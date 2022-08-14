<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BankAdminController;
use App\Http\Controllers\BankGroupController;
use App\Http\Controllers\PengajuanKurController;

// authentication admin

Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/login', [AdminAuthController::class, 'cekLogin']);

Route::get('pdf-generate', [PDFController::class, 'generatePDF']);


Route::get('/', [PublicController::class, 'index']);
Route::get('/latar-belakang', [PublicController::class, 'latar_belakang']);
Route::get('/dasar-pembentukan', [PublicController::class, 'dasar_pembentukan']);
Route::get('/road-map', [PublicController::class, 'roadmap']);
Route::get('/tpakd-kalteng', [PublicController::class, 'tpakd_kalteng']);
Route::get('/infografis-keuangan', [PublicController::class, 'infografis_keuangan']);
Route::get('/berita', [PublicController::class, 'berita']);
Route::get('/layanan-konsumen', [PublicController::class, 'layanan_konsumen']);
Route::get('/pengajuan-kur', [PublicController::class, 'pengajuan_kur']);
Route::get('/pengajuan-sukses/{no_pengajuan}', [PublicController::class, 'pengajuanSukses']);
Route::get('/informasi-kpmr', [PublicController::class, 'informasi_kpmr']);
Route::get('/informasi-kur', [PublicController::class, 'informasi_kur']);


Route::post('/pengajuan-kur', [PengajuanKurController::class, 'store']);


// Route::get('/admin/', [AdminController::class, 'index']);




Route::get('/bank/', [BankController::class, 'index']);
Route::post('/bank/', [BankController::class, 'store']);
Route::get('/bank/create', [BankController::class, 'create']);


Route::get('/bank-d/', [BankCoBankAdminControllerntroller::class, 'index']);
Route::post('/bank-admin/', [BankAdminController::class, 'store']);
Route::get('/bank-admin/create', [BankAdminController::class, 'create']);

Route::middleware(['islogin'])->group(function () {
    Route::get('/add-user', [UserController::class, 'create']);
    Route::post('/add-user', [UserController::class, 'storeUser']);

    Route::middleware(['isSuperAdmin'])->group(function () {
        Route::get('/superadmin', [AdminAuthController::class, 'indexSuperAdmin']);
        Route::get('/superadmin/setup', [AdminController::class, 'setup'])->name('superadmin-page'); 
        Route::get('/superadmin/bank/create', [BankController::class, 'createBank']); 

        Route::get('/superadmin/bank',  [BankController::class, 'index']);     
        Route::get('/superadmin/admin-bank',  [AdminController::class, 'adminBank']);  
       
        Route::get('/bank-name-create', [BankController::class, 'createBank']);
        Route::post('/bank-group', [BankGroupController::class, 'store']);
        Route::get('/bank-group/create', [BankGroupController::class, 'create']);
    });
    
    Route::middleware(['isAdminBank'])->group(function () {
        Route::get('/admin', [AdminAuthController::class, 'indexAdmin']);
        Route::get('/admin/bank',  [BankController::class, 'index'])->name('admin-page');
        Route::get('/admin/bank/create',  [BankController::class, 'createBank']);      
        Route::get('/admin/our-bank',  [BankController::class, 'index']);  
    });
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/bank-admin', [AdminAuthController::class, 'indexBank'])->name('bank-page');
        
    });
    Route::get('/bank-admin/kur', [PengajuanKurController::class, 'pengajuanKur'])->name('bank-page');
    
});                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            