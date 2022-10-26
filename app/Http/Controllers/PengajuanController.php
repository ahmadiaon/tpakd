<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Mail;
use Carbon\Carbon;
use App\Models\Bank;
use App\Models\BankAdmin;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    //
    public function pengajuan_kpmr($id = null){
        $banks = DB::select('select banks.bank_name as bankname, banks.* from 
        `banks`, users , 
        `bank_names`,
        `office_statuses`,
        `bank_operationals`, 
        `bank_admins`,  
        `dat_i_s` , `krs`,   
        `job_desks`, 
        `bank_owners` ,
        `dat_i_i_s`,
        `roles`  
        WHERE 
        `bank_names`.`id` = `banks`.`bank_name_id` 
        AND`office_statuses`.`id` = `banks`.`office_status_id` 
        AND `bank_operationals`.`id` = `banks`.`bank_operational_id`
        AND`bank_owners`.`id` = `banks`.`bank_owner_id`
        AND `dat_i_s`.`id` = `banks`.`dat_i_id` 
        AND`dat_i_i_s`.`id` = `banks`.`dat_i_i_id`
        AND `krs`.`id` = `banks`.`kr_id`
        AND `job_desks`.`id` = `banks`.`job_desk_id` 
        AND`bank_admins`.`bank_id` = `banks`.`id` 
        AND users.id = bank_admins.user_id
        AND users.role_id = roles.id');
        $data = [
            'title' => 'Pengajuan KUR',
            'active'=> 'akses_keuangan',
            'banks' => $banks,
            'id' => $id
        ];
        // return redirect()->route('/pengajuan-sukses/'.$data->id);
        return view('pub.pengajuan_kpmr',$data);
    }
    public function pengajuan_simpel($id = null){
        $banks = DB::select('select banks.bank_name as bankname, banks.* from 
        `banks`, users , 
        `bank_names`,
        `office_statuses`,
        `bank_operationals`, 
        `bank_admins`,  
        `dat_i_s` , `krs`,   
        `job_desks`, 
        `bank_owners` ,
        `dat_i_i_s`,
        `roles`  
        WHERE 
        `bank_names`.`id` = `banks`.`bank_name_id` 
        AND`office_statuses`.`id` = `banks`.`office_status_id` 
        AND `bank_operationals`.`id` = `banks`.`bank_operational_id`
        AND`bank_owners`.`id` = `banks`.`bank_owner_id`
        AND `dat_i_s`.`id` = `banks`.`dat_i_id` 
        AND`dat_i_i_s`.`id` = `banks`.`dat_i_i_id`
        AND `krs`.`id` = `banks`.`kr_id`
        AND `job_desks`.`id` = `banks`.`job_desk_id` 
        AND`bank_admins`.`bank_id` = `banks`.`id` 
        AND users.id = bank_admins.user_id
        AND users.role_id = roles.id');
        $data = [
            'title' => 'Pengajuan SimPel',
            'active'=> 'akses_keuangan',
            'banks' => $banks,
            'id' => $id
        ];
        // return redirect()->route('/pengajuan-sukses/'.$data->id);
        return view('pub.pengajuan_simpel',$data);
    }
    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'jenis_pengajuan' => '',
            'nama' => '',
            'email' => '',
            'gender' => '',
            'nik'   => '',
            'no_telpon' => '',
            'tanggal_lahir' => '',
            'bank_id' => '',
            'date_pending' => '',
            'nama_usaha' => '',
            'alamat_usaha' => '',
            'jenis_usaha' => '',
            'nama_sekolah' => '',
            'alamat_sekolah' => '',
            'nama_guru_pic' => '',
            'no_telpon_guru_pic' => '',
            'date_pending'=>'',
            'status'=>''
        ]);
        $validatedData['date_pending']  = Carbon::today('Asia/Jakarta')->isoFormat('Y-M-D');
        $validatedData['status']  = 'pending';
        // dd($validatedData);
        $Pengajuan = Pengajuan::create($validatedData);


        $id_kur = $validatedData['jenis_pengajuan'].'-'.$Pengajuan->id;
        $mailData = [
            'title' => 'Pengajuan TPKAD',
            'id_pengajuan'  => $id_kur,
            'body' => 'Anda telah melakukan pengajuan, dengan nomor pengajuan :'.$id_kur.' Silahkan cek secara berkala pada web,'
        ]; 
        $mailDataMasuk = [
            'title' => 'Pengajuan TPKAD',
            'id_pengajuan'  => $id_kur,
            'body' => 'Pengajuan masuk :'.$id_kur.' ,'
        ];    
        //  dd($mailData);
        $delete = Bank::where('id', $validatedData['bank_id'])->get()->first();
        $data = BankAdmin::where('bank_id', $delete->id)->get()->first();
        $admindata = User::where('id' , $data->user_id)->get()->first();


        Mail::to($Pengajuan->email)->send(new SendMail($mailData));        
        Mail::to($admindata->email)->send(new SendMail($mailDataMasuk));
        return view('pub.pengajuan_sukses',[
            'title'=>'pengajuan kur',
            'active' => 'home',
            'mail_data' => $mailData,
            'id_kur'    => $id_kur,
            'data'     => $Pengajuan,
        ]);
    }

    public function show($jenis_pengajuan){
        // dd(session('dataUser'));
        if(session('dataUser')->role_id == 2 ||session('dataUser')->role_id == 3 ){
            $bank_id = session('dataUser')->bank_id; 
        }
        // dd($jenis_pengajuan);
        $jenis_pengajuan = strtoupper($jenis_pengajuan);
        $data = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan',$jenis_pengajuan)
        ->get([
            'pengajuans.*',
            'banks.bank_name'
        ]);

        // dd($data);
        return view('admin.pengajuan.index',[
            'title'=>'pengajuan kur',
            'active' => $jenis_pengajuan,
            'jenis_pengajuan'   => $jenis_pengajuan,
            'datas'  => $data]);
    }

    public function showAdmin($jenis_pengajuan, $id_bank){
        $datasss = [
            'jenis_pengajuan'   => $jenis_pengajuan,
            'id_bank'       => $id_bank
        ];
        
        // if(session('dataUser')->role_id == 2 ||session('dataUser')->role_id == 3 ){
        //     $bank_id = session('dataUser')->bank_id; 
        // }
        // dd($jenis_pengajuan);
         $bank = Bank::where('id', $id_bank)->get()->first();
        $jenis_pengajuan = strtoupper($jenis_pengajuan);
        $data = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$id_bank)
        ->where('jenis_pengajuan',$jenis_pengajuan)
        ->get([
            'pengajuans.*',
            'banks.bank_name'
        ]);

        // dd($data);
        return view('admin.pengajuan.indexAdmin',[
            'title'=>'pengajuan kur',
            'banks' => $bank,
            'active' => $jenis_pengajuan,
            'jenis_pengajuan'   => $jenis_pengajuan,
            'datas'  => $data
        ]);
    }

    public function countPengajuan(){
        // dd(session('dataUser'));
        if(session('dataUser')->role_id == 2 ||session('dataUser')->role_id == 3 ){
            $bank_id = session('dataUser')->bank_id; 
        }
        // dd($jenis_pengajuan);
        $kur = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','KUR')
        ->where('status','pending')
        ->count();
        $kpmr = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','KPMR')
        ->where('status','pending')
        ->count();
        $baru = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','BARU')
        ->where('status','pending')
        ->count();
        $pinjaman = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','PINJAMAN')
        ->where('status','pending')
        ->count();
        $simpel = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','SIMPEL')
        ->where('status','pending')
        ->count();
        $qris = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','QRIS')
        ->where('status','pending')
        ->count();

        $done_kur = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','KUR')
        ->where('status','done')
        ->count();
        $done_kpmr = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','KPMR')
        ->where('status','done')
        ->count();
        $done_baru = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','BARU')
        ->where('status','done')
        ->count();
        $done_pinjaman = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','PINJAMAN')
        ->where('status','done')
        ->count();
        $done_simpel = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','SIMPEL')
        ->where('status','done')
        ->count();
        $done_qris = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
        ->latest()
        ->where('bank_id',$bank_id)
        ->where('jenis_pengajuan','QRIS')
        ->where('status','done')
        ->count();

        $dataa = [
            'pending_kur'   => $kur,
            'pending_kpmr'   => $kpmr,
            'pending_baru'   => $baru,
            'pending_pinjaman'   => $pinjaman,
            'pending_simpel'   => $simpel,
            'pending_qris'   => $qris,

            'done_kur'   => $done_kur,
            'done_kpmr'   => $done_kpmr,
            'done_baru'   => $done_baru,
            'done_pinjaman'   => $done_pinjaman,
            'done_simpel'   => $done_simpel,
            'done_qris'   => $done_qris,
        ];

       return view('admin.pengajuan.list_index',[
            'title'=>'pengajuan kur',
            'active' => 'list',
            'pending_kur'   => $kur,
            'pending_kpmr'   => $kpmr,
            'pending_baru'   => $baru,
            'pending_pinjaman'   => $pinjaman,
            'pending_simpel'   => $simpel,
            'pending_qris'   => $qris,

            'done_kur'   => $done_kur,
            'done_kpmr'   => $done_kpmr,
            'done_baru'   => $done_baru,
            'done_pinjaman'   => $done_pinjaman,
            'done_simpel'   => $done_simpel,
            'done_qris'   => $done_qris,
        ]);
    }

    public function export(Request $request, $jenis_pengajuan){
        $abjads = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH'];
        $date_done = Carbon::today('Asia/Jakarta')->isoFormat('Y-M-D');

        


        if(session('dataUser')->role_id == 2 ||session('dataUser')->role_id == 3 ){
            $bank_id = session('dataUser')->bank_id;             
        }
        // dd($bank_id);
        $jenis_pengajuan = strtoupper($request->jenis_pengajuan);
        if($request->isAll){
            $data = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
            ->latest()
            ->where('bank_id',$bank_id)
            ->where('jenis_pengajuan',$jenis_pengajuan)
            ->get([
                'pengajuans.*',
                'banks.bank_name'
            ]);
        }else{
            $data = Pengajuan::join('banks', 'banks.id', 'pengajuans.bank_id')
            ->latest()
            ->where('bank_id',$bank_id)
            ->where('jenis_pengajuan',$jenis_pengajuan)
            // ->where('date_pending', '>=', '2022-09-12')
            // ->where('date_pending', '<=', $request->end_date)
            ->whereBetween('date_pending',[$request->start_date, $request->end_date])
            ->get([
                'pengajuans.*',
                'banks.bank_name'
            ]);

            // dd($data);
        }
        

        $createSpreadsheet = new spreadsheet();
        $createSheet = $createSpreadsheet->getActiveSheet();
        // return $jenis_pengajuan;
        $createSheet->setCellValue('A1', 'Nama');
        $createSheet->setCellValue('B1', 'Email');
        $createSheet->setCellValue('C1', 'NIK');
        $createSheet->setCellValue('D1', 'Jenis Kelamin');
        $createSheet->setCellValue('E1', 'No Telpon');
        $createSheet->setCellValue('F1', 'Tanggal Lahir');
        $createSheet->setCellValue('G1', 'Tanggal Masuk');
        if($jenis_pengajuan == 'QRIS'){            
            $createSheet->setCellValue('H1', 'Nama Usaha');
            $createSheet->setCellValue('I1', 'Jenis Usaha');
            $createSheet->setCellValue('J1', 'Alamat Usaha');
        }
        if($jenis_pengajuan == 'SIMPEL'){            
            $createSheet->setCellValue('H1', 'Nama Sekolah');
            $createSheet->setCellValue('I1', 'Alamat Sekolah');
            $createSheet->setCellValue('J1', 'Nama Guru PIC');
            $createSheet->setCellValue('J1', 'no Telpon Guru PIC');
        }
        $cell = 2;
        foreach($data as $item){
            $createSheet->setCellValue('A'.$cell, $item->nama);
            $createSheet->setCellValue('B'.$cell, $item->email);
            $createSheet->setCellValue('C'.$cell, "'".$item->nik);
            $createSheet->setCellValue('D'.$cell, $item->gender);
            $createSheet->setCellValue('E'.$cell, "'".$item->no_telpon);
            $createSheet->setCellValue('F'.$cell, $item->tanggal_lahir);
            $createSheet->setCellValue('G'.$cell, $item->date_pending);
            if($item->jenis_pengajuan == 'QRIS'){            
                $createSheet->setCellValue('H'.$cell, $item->nama_usaha);
                $createSheet->setCellValue('I'.$cell, $item->jenis_usaha);
                $createSheet->setCellValue('J'.$cell, $item->alamat_usaha);
            }
            if($item->jenis_pengajuan == 'SIMPEL'){            
                $createSheet->setCellValue('H'.$cell, $item->nama_sekolah);
                $createSheet->setCellValue('I'.$cell, $item->alamat_sekolah);
                $createSheet->setCellValue('J'.$cell, $item->nama_guru_pic);                
                $createSheet->setCellValue('K'.$cell, "'".$item->no_telpon_guru_pic);
            }
            if($item->date_done == ''){
                $the_data = ['date_done'=>$date_done,'status'=> 'done'];
                $Pengajuan = Pengajuan::updateOrCreate(['id' => $item->id],$the_data);
            }
            $cell++;

        }
        $date_now =Carbon::now('Asia/Jakarta');

        $crateWriter = new Xls($createSpreadsheet);
        $crateWriter->save($date_now.'-pengajuan.xlsx');
        return response()->download($date_now.'-pengajuan.xlsx');
    }
    
    
}
