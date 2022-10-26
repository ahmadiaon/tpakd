<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PubController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BankAdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\BankOperationalController;
use App\Http\Controllers\DatIIController;
use App\Http\Controllers\DatIController;
use App\Http\Controllers\BankOwnerController;
use App\Http\Controllers\OfficeStatusController;
use App\Http\Controllers\BankGroupController;
use App\Http\Controllers\PengajuanKurController;
use App\Http\Controllers\TpakdKaltengController;
use App\Http\Controllers\FinancialInformationController;
use App\Http\Controllers\PromotionController;

// authentication admin

Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/login', [AdminAuthController::class, 'cekLogin']);

Route::get('pdf-generate', [PDFController::class, 'generatePDF']);


Route::get('/', [PubController::class, 'index']);
Route::get('/latar-belakang', [PubController::class, 'latar_belakang']);
Route::get('/dasar-pembentukan', [PubController::class, 'dasar_pembentukan']);
Route::get('/road-map', [PubController::class, 'roadmap']);
Route::get('/tpakd-kalteng', [PubController::class, 'tpakd_kalteng']);
Route::get('/infografis-keuangan', [PubController::class, 'infografis_keuangan']);
Route::get('/berita', [PubController::class, 'berita']);
Route::get('/layanan-konsumen', [PubController::class, 'layanan_konsumen']);
Route::get('/pengajuan-kur', [PubController::class, 'pengajuan_kur']);
Route::get('/pengajuan-kur/{id}', [PubController::class, 'pengajuan_kur']);
Route::get('/pengajuan-kpmr', [PengajuanController::class, 'pengajuan_kpmr']);
Route::get('/pengajuan-kpmr/{id}', [PengajuanController::class, 'pengajuan_kpmr']);
Route::get('/pengajuan-simpel', [PengajuanController::class, 'pengajuan_simpel']);
Route::get('/pengajuan-simpel/{id}', [PengajuanController::class, 'pengajuan_simpel']);

Route::get('/pengajuan-rekening', [PubController::class, 'pengajuan_rekening']);
Route::get('/pengajuan-rekening/{id}', [PubController::class, 'pengajuan_rekening']);

Route::get('/pengajuan-qris', [PubController::class, 'pengajuan_qris']);
Route::get('/pengajuan-qris/{id}', [PubController::class, 'pengajuan_qris']);

Route::get('/pengajuan-pinjaman', [PubController::class, 'pengajuan_pinjaman']);
Route::get('/pengajuan-pinjaman/{id}', [PubController::class, 'pengajuan_pinjaman']);
Route::get('/pengajuan-sukses/{no_pengajuan}', [PubController::class, 'pengajuanSukses']);
Route::get('/informasi-kpmr', [PubController::class, 'informasi_kpmr']);
Route::get('/informasi-kur', [PubController::class, 'informasi_kur']);
Route::get('/informasi-qris', [PubController::class, 'informasi_qris']);
Route::get('/informasi-simpel', [PubController::class, 'informasi_simpel']);
Route::get('/berita/{slug}', [PubController::class, 'detail_berita']);
Route::get('/promosi', [PubController::class, 'promosi']);
// Route::get('/maps', [PubController::class, 'maps']);

Route::get('/maps', [PubController::class, 'maps']);
Route::get('/pilih/{id}', [PubController::class, 'pilih']);
Route::get('/pengajuan', [PengajuanController::class, 'store']);
Route::post('/pengajuan', [PengajuanController::class, 'store']);

Route::post('/pengajuan-kur', [PengajuanKurController::class, 'store']);
Route::get('/pengajuan-saya', [PubController::class, 'pengajuanSaya']);
Route::get('/pengajuan-saya/{id_pengajuan}', [PubController::class, 'cariPengajuanSaya']);


Route::get('/maps', [PubController::class, 'maps']);


// Route::get('/admin/', [AdminController::class, 'index']);



Route::get('/bank/', [BankController::class, 'index']);
Route::post('/bank-store', [BankController::class, 'store']);
Route::get('/bank/create', [BankController::class, 'create']);


Route::get('/bank-d/', [BankCoBankAdminControllerntroller::class, 'index']);
Route::post('/bank-admin/', [BankAdminController::class, 'store']);
Route::get('/bank-admin/create', [BankAdminController::class, 'create']);
Route::get('send-mail', [MailController::class, 'index']);
Route::middleware(['islogin'])->group(function () {
    Route::get('/admin/pengajuan/{jenis_pengajuan}/{id_bank}', [PengajuanController::class, 'showAdmin']);



    Route::get('/list-pengajuan/{jenis_pengajuan}', [PengajuanController::class, 'show']);
    Route::get('/index-pengajuan', [PengajuanController::class, 'countPengajuan']);
    Route::post('/export-list-pengajuan/{jenis_pengajuan}', [PengajuanController::class, 'export']);

    Route::get('/my-bank', [BankController::class, 'show']);
    Route::post('/my-bank', [BankController::class, 'store']);
    Route::get('/profile', [UserController::class, 'show']);



    Route::get('/add-user', [UserController::class, 'create']);
    Route::post('/add-user', [UserController::class, 'storeUser']);
    Route::post('/update-user', [UserController::class, 'updateUser']);
    Route::get('/superadmin/admin-bank/delete/{id}',  [BankController::class, 'delete']);    
    Route::get('/superadmin/admin-bank/reset/{id}',  [BankController::class, 'resetPass']);    
    Route::get('/bank/edit/{id}',  [BankController::class, 'showAdmin']);    
    Route::middleware(['isSuperAdmin'])->group(function () {
        Route::get('/superadmin', [AdminController::class, 'index']);
        Route::get('/superadmin/setup', [AdminController::class, 'setup'])->name('superadmin-page'); 
        Route::get('/superadmin/bank/create', [BankController::class, 'createBank']); 

        Route::get('/superadmin/bank',  [BankController::class, 'index']);     
        
        Route::get('/superadmin/admin-bank',  [AdminController::class, 'adminBank']);  
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

        Route::get('/superadmin/berita',  [NewsController::class, 'index']);  
        Route::get('/superadmin/berita/{slug}/edit',  [NewsController::class, 'show']);  
        Route::get('/superadmin/berita/create',  [NewsController::class, 'create']);  
        Route::post('/superadmin/berita',  [NewsController::class, 'store']);  
        Route::get('/superadmin/berita/delete/{slug}',  [NewsController::class, 'delete']);
        
        Route::get('/superadmin/promosi',  [PromotionController::class, 'index']);  
        Route::get('/superadmin/promosi/{slug}/edit',  [NewsController::class, 'show']);  
        Route::get('/superadmin/promosi/create',  [PromotionController::class, 'create']);  
        Route::post('/superadmin/promosi',  [PromotionController::class, 'store']);  
        Route::get('/superadmin/promosi/delete/{slug}',  [NewsController::class, 'delete']); 


        // tentang tpakd
        
        Route::get('/superadmin/dasar-pembentukan',  [PubController::class, 'createDasarPembentukan']);  
        Route::post('/superadmin/dasar-pembentukan',  [PubController::class, 'storeDasarPembentukan']);  

        Route::get('/superadmin/tpakd-kalteng/create',  [TpakdKaltengController::class, 'create']); 
        Route::get('superadmin/tpakd-kalteng',  [TpakdKaltengController::class, 'index']); 
        Route::get('/superadmin/tpakd-kalteng/edit/{slug}',  [TpakdKaltengController::class, 'show']); 
        Route::get('/superadmin/tpakd-kalteng/delete/{slug}',  [TpakdKaltengController::class, 'delete']); 
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
        Route::get('/beranda', [AdminController::class, 'index']);
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