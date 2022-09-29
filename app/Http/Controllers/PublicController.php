<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Grafik;
use App\Models\Profile;
use App\Models\GrafikDua;
use Illuminate\Http\File;
use App\Models\PengajuanKur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    //
    public function index(){
        $newss = News::latest()->get()->take(4);
        $grafik1 = Grafik::where('is_aktif', 1)->get()->first();
        $grafik2 = GrafikDua::where('is_aktif', 1)->get()->first();
        $data = [
            'title' => 'Home',
            'active'=> 'home',
            'grafik1'=> $grafik1,
            'grafik2'=> $grafik2,
            'newss' => $newss
        ];
        return view('pub.index',$data);
    }
    public function mapsIndex(){
        $data = [
            'title' => 'Home',
            'active'=> 'home',
        ];
        return view('pub.maps',$data);
    }
    public function pengajuanSaya(){
        // return 'aaa';
        $data = [
            'title' => 'Pengajuan',
            'active'=> 'pengajuan',
        ];
        return view('pub.pengajuan_saya',$data);
    }
    public function pengajuanSukses($no_pengajuan){
        // return $no_pengajuan;
        
        return view('pub.pengajuan_sukses',[
            'active'=> 'home','title' => 'Home',
            'no_pengajuan' => $no_pengajuan ]);
    }
    public function latar_belakang(){
        $profile = Profile::get()->first();
        $data = [
            'profile'   => $profile,
            'title' => 'Latar Belakang',
            'active'=> 'home'
        ];
        return view('pub.latar_belakang',$data);
    }
    public function dasar_pembentukan(){
        $profile = Profile::get()->first();
        $data = [
            'profile'   => $profile,
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
    public function detail_berita($slug){
        $data = [
            'title' => 'Berita',
            'active'=> 'berita',
            'news'  => $news = News::where('slug', $slug)->first()
        ];
        return view('pub.detail_berita', $data);
    }
    public function pengajuan_kur(){
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
            'banks' => $banks
        ];
        // return redirect()->route('/pengajuan-sukses/'.$data->id);
        return view('pub.pengajuan_kur',$data);
    }


    public function cariPengajuanSaya(Request $request){
        $validatedData = $request->validate([
            'no_pengajuan'         => 'required|max:255'
        ]);
        $jenis;

        $no = explode('-',$validatedData['no_pengajuan']);
        if($no[0] == 'KUR'){
            $jenis = "pengajuan_kurs";
        }else{
            return 'else';
        }
       

        $search = DB::table($jenis)->where('id', $no[1])
        ->get();


        if($search->isNotEmpty()){
            // dd( $search->first());
            $data = [
                'searched' => $search->first(),
                'data'  => true
            ];
            // dd($data);
            return back()->with('data', $search->first());
        }else{
            return back()->with('data', false);
        }

        $pengajuanKurs = PengajuanKur::create($validatedData);

    }









   
    public function storeLatar_belakang(Request $request){
        $validatedData = $request->validate([
            'latar_belakang_description'      => 'required'
        ]);
        if ($request->file('image')) {
            $imageName =  'latar_belakang.' . $request->image->extension();
            $name = 'image/assets/'.$imageName;
            if(file_exists($name)){
                 $da = unlink($name);
            }
            // dd();
            $isMoved = $request->image->move('image/assets/', $imageName);

            if($isMoved){
                $validatedData['latar_belakang_photo_path'] = 'image/assets/'.$imageName;
            }
        }

        $created = Profile::updateOrCreate(['id' =>1], $validatedData);
        return redirect('/superadmin/latar-belakang')->with('success', 'Latar Belakang Edited');
        // dd($created);
        // return $request;
    }

    
    public function createDasarPembentukan(){
        $profile = Profile::get()->first();
        
        $news='';
        $data = [
            'news'  => $news,
            'profile'   => $profile
        ];
        // dd($data);
        return view('admin.superadmin.tentang_tpakd.dasar_pembentukan', $data);
    }
    public function storeDasarPembentukan(Request $request){
        $validatedData = $request->validate([
            'dasar_pembentukan_description'      => 'required'
        ]);
        if ($request->file('image')) {
            $imageName =  'dasar_pembentukan.' . $request->image->extension();
            $name = 'image/assets/'.$imageName;
            if(file_exists($name)){
                 $da = unlink($name);
            }
            // dd();
            $isMoved = $request->image->move('image/assets/', $imageName);

            if($isMoved){
                $validatedData['dasar_pembentukan_photo_path'] = 'image/assets/'.$imageName;
            }
        }

        $created = Profile::updateOrCreate(['id' =>1], $validatedData);
        return redirect('/superadmin/dasar-pembentukan')->with('success', 'Dasar Pembentukan Edited');
        // dd($created);
        // return $request;
    }
}
