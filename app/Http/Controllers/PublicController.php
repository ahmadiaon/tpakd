<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    //
    public function index(){
        $data = [
            'title' => 'Home',
            'active'=> 'home'
        ];
        return view('pub.index',$data);
    }
    public function pengajuanSukses($no_pengajuan){
        // return $no_pengajuan;
        
        return view('pub.pengajuan_sukses',[
            'active'=> 'home','title' => 'Home',
            'no_pengajuan' => $no_pengajuan ]);
    }
    public function latar_belakang(){
        $data = [
            
            'title' => 'Latar Belakang',
            'active'=> 'home'
        ];
        return view('pub.latar_belakang',$data);
    }
    public function dasar_pembentukan(){
        $data = [
            'title' => 'Dasar Pembentukan',
            'active'=> 'home'
        ];
        return view('pub.dasar_pembentukan',$data);
    }
    public function roadmap(){
        $data = [
            'title' => 'Roadmap',
            'active'=> 'home'
        ];
        return view('pub.roadmap',$data);
    }
    public function tpakd_kalteng(){
        $data = [
            'title' => 'Tpakd Kalteng',
            'active'=> 'home'
        ];
        return view('pub.tpakd',$data);
    }
    public function infografis_keuangan(){
        $data = [
            'title' => 'Infografis Keuangan',
            'active'=> 'infografis_keuangan'
        ];
        return view('pub.infografis_keuangan',$data);
    }
    public function berita(){
        $data = [
            'title' => 'Tpakd Berita',
            'active'=> 'berita'
        ];
        return view('pub.berita',$data);
    }
    public function layanan_konsumen(){
        $data = [
            'title' => 'Layanan Konsumen',
            'active'=> 'layanan_konsumen'
        ];
        return view('pub.layanan_konsumen',$data);
    }
    public function informasi_kpmr(){
        $data = [
            'title' => 'Layanan Konsumen',
            'active'=> 'layanan_konsumen'
        ];
        return view('pub.informasi_kpmr',$data);
    }
    public function informasi_kur(){
        $data = [
            'title' => 'Layanan Konsumen',
            'active'=> 'layanan_konsumen'
        ];
        return view('pub.informasi_kur',$data);
    }
    public function pengajuan_kur(){
        $banks = DB::select('select * from 
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
            'banks' => $banks
        ];
        // return redirect()->route('/pengajuan-sukses/'.$data->id);
        return view('pub.pengajuan_kur',$data);
    }
}
