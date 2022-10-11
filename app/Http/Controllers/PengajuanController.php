<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Mail;
use Carbon\Carbon;
use App\Models\Bank;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;

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
            'title' => 'Pengajuan KUR TPKAD',
            'id_pengajuan'  => $id_kur,
            'body' => 'Anda telah melakukan pengajuan, dengan nomor pengajuan :'.$id_kur.' Silahkan cek secara berkala pada web,'
        ];   
        //  dd($mailData);
        Mail::to($Pengajuan->email)->send(new SendMail($mailData));
        return view('pub.pengajuan_sukses',[
            'title'=>'pengajuan kur',
            'active' => 'home',
            'mail_data' => $mailData,
            'id_kur'    => $id_kur,
            'data'     => $Pengajuan,
        ]);
    }
}
