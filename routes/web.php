<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BankAdminController;
use App\Http\Controllers\BankGroupController;
use App\Http\Controllers\PengajuanKurController;
use App\Http\Controllers\TpakdKaltengController;
use App\Http\Controllers\FinancialInformationController;

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
Route::get('/informasi-qris', [PublicController::class, 'informasi_qris']);
Route::get('/informasi-simpel', [PublicController::class, 'informasi_simpel']);
Route::get('/berita/{slug}', [PublicController::class, 'detail_berita']);

Route::get('/maps', [PublicController::class, 'mapsIndex']);


Route::post('/pengajuan-kur', [PengajuanKurController::class, 'store']);
Route::get('/pengajuan-saya', [PublicController::class, 'pengajuanSaya']);
Route::get('/pengajuan-saya/{id_pengajuan}', [PublicController::class, 'cariPengajuanSaya']);


Route::get('/maps', [PublicController::class, 'maps']);


// Route::get('/admin/', [AdminController::class, 'index']);




Route::get('/bank/', [BankController::class, 'index']);
Route::post('/bank/', [BankController::class, 'store']);
Route::get('/bank/create', [BankController::class, 'create']);


Route::get('/bank-d/', [BankCoBankAdminControllerntroller::class, 'index']);
Route::post('/bank-admin/', [BankAdminController::class, 'store']);
Route::get('/bank-admin/create', [BankAdminController::class, 'create']);
Route::get('send-mail', [MailController::class, 'index']);
Route::middleware(['islogin'])->group(function () {
    Route::get('/add-user', [UserController::class, 'create']);
    Route::post('/add-user', [UserController::class, 'storeUser']);

    Route::middleware(['isSuperAdmin'])->group(function () {
        Route::get('/superadmin', [AdminAuthController::class, 'indexSuperAdmin']);
        Route::get('/superadmin/setup', [AdminController::class, 'setup'])->name('superadmin-page'); 
        Route::get('/superadmin/bank/create', [BankController::class, 'createBank']); 

        Route::get('/superadmin/bank',  [BankController::class, 'index']);     
        Route::get('/superadmin/admin-bank',  [AdminController::class, 'adminBank']);  

        Route::get('/superadmin/berita',  [NewsController::class, 'index']);  
        Route::get('/superadmin/berita/{slug}/edit',  [NewsController::class, 'show']);  
        Route::get('/superadmin/berita/create',  [NewsController::class, 'create']);  
        Route::post('/superadmin/berita',  [NewsController::class, 'store']);  


        // tentang tpakd
        
        Route::get('/superadmin/dasar-pembentukan',  [PublicController::class, 'createDasarPembentukan']);  
        Route::post('/superadmin/dasar-pembentukan',  [PublicController::class, 'storeDasarPembentukan']);  

        Route::get('superadmin/tpakd-kalteng',  [TpakdKaltengController::class, 'index']); 
        Route::get('/superadmin/tpakd-kalteng/edit/{slug}',  [TpakdKaltengController::class, 'show']); 
        Route::post('/superadmin/tpakd-kalteng', [TpakdKaltengController::class, 'store']);


        Route::get('/superadmin/grafik',  [GrafikController::class, 'index']); 
        Route::post('/superadmin/grafik-1',  [GrafikController::class, 'store']);
        Route::post('/superadmin/grafik-2',  [GrafikController::class, 'storeDua']);
       
        Route::get('/bank-name-create', [BankController::class, 'createBank']);
        Route::post('/bank-group', [BankGroupController::class, 'store']);
        Route::get('/bank-group/create', [BankGroupController::class, 'create']);

        Route::get('/superadmin/financial-information', [FinancialInformationController::class, 'index']);
        Route::get('/superadmin/financial-information/{id}/edit', [FinancialInformationController::class, 'show']);
        Route::post('/superadmin/financial-information', [FinancialInformationController::class, 'store']);
        
    });
    
    Route::middleware(['isAdminBank'])->group(function () {
        Route::get('/admin', [AdminAuthController::class, 'indexAdmin']);
        Route::get('/admin/bank',  [BankController::class, 'index'])->name('admin-page');
        Route::get('/admin/bank/create',  [BankController::class, 'createBank']);      
        Route::get('/admin/our-bank',  [BankController::class, 'index']);  
    });
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/bank-admin', [AdminAuthController::class, 'indexBank']);
        Route::get('/bank-admin/kur', [PengajuanKurController::class, 'pengajuanKur'])->name('bank-page');
    });
    
    
});                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            