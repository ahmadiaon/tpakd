<?php

use App\Models\BankOwner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DatIController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatIIController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BankAdminController;
use App\Http\Controllers\BankGroupController;
use App\Http\Controllers\BankOwnerController;
use App\Http\Controllers\OfficeStatusController;
use App\Http\Controllers\PengajuanKurController;
use App\Http\Controllers\TpakdKaltengController;
use App\Http\Controllers\BankOperationalController;
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
Route::get('/pengajuan-kur/{id}', [PublicController::class, 'pengajuan_kur']);
Route::get('/pengajuan-kpmr', [PublicController::class, 'pengajuan_kpmr']);
Route::get('/pengajuan-kpmr/{id}', [PublicController::class, 'pengajuan_kpmr']);
Route::get('/pengajuan-simpel', [PublicController::class, 'pengajuan_simpel']);
Route::get('/pengajuan-simpel/{id}', [PublicController::class, 'pengajuan_simpel']);

Route::get('/pengajuan-rekening', [PublicController::class, 'pengajuan_rekening']);
Route::get('/pengajuan-rekening/{id}', [PublicController::class, 'pengajuan_rekening']);

Route::get('/pengajuan-qris', [PublicController::class, 'pengajuan_qris']);
Route::get('/pengajuan-qris/{id}', [PublicController::class, 'pengajuan_qris']);

Route::get('/pengajuan-pinjaman', [PublicController::class, 'pengajuan_pinjaman']);
Route::get('/pengajuan-pinjaman/{id}', [PublicController::class, 'pengajuan_pinjaman']);
Route::get('/pengajuan-sukses/{no_pengajuan}', [PublicController::class, 'pengajuanSukses']);
Route::get('/informasi-kpmr', [PublicController::class, 'informasi_kpmr']);
Route::get('/informasi-kur', [PublicController::class, 'informasi_kur']);
Route::get('/informasi-qris', [PublicController::class, 'informasi_qris']);
Route::get('/informasi-simpel', [PublicController::class, 'informasi_simpel']);
Route::get('/berita/{slug}', [PublicController::class, 'detail_berita']);
// Route::get('/maps', [PublicController::class, 'maps']);

Route::get('/maps', [PublicController::class, 'maps']);
Route::get('/pilih/{id}', [PublicController::class, 'pilih']);


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
        Route::post('/superadmin/setup/bank-owner/store', [BankOwnerController::class, 'store']);

        Route::get('/superadmin/setup/bank-owner/{id}/get', [BankOwnerController::class, 'show']);   
        Route::get('/superadmin/setup/dat-i/{id}/get', [DatIController::class, 'show']);   
        Route::get('/superadmin/setup/dat-i-i/{id}/get', [DatIIController::class, 'show']);   
        Route::get('/superadmin/setup/bank-operational/{id}/get', [BankOperationalController::class, 'show']);  
        Route::get('/superadmin/setup/office-status/{id}/get', [OfficeStatusController::class, 'show']); 

        Route::post('/superadmin/bank-owner/delete', [BankOwnerController::class, 'delete']);
        Route::post('/superadmin/dat-i/delete', [DatIController::class, 'delete']);
        Route::post('/superadmin/dat-i-i/delete', [DatIIController::class, 'delete']);
        Route::post('/superadmin/bank-operational/delete', [BankOperationalController::class, 'delete']);
        Route::post('/superadmin/office-status/delete', [OfficeStatusController::class, 'delete']);

        Route::post('/superadmin/dat-i/store', [DatIController::class, 'store']); 
        Route::post('/superadmin/dat-i-i/store', [DatIIController::class, 'store']); 
        Route::post('/superadmin/bank-operational/store', [BankOperationalController::class, 'store']); 
        Route::post('/superadmin/office-status/store', [OfficeStatusController::class, 'store']); 
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