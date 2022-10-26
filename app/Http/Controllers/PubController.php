<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\News;
use App\Models\Promotion;
use App\Models\Grafik;
use App\Models\Profile;
use App\Models\GrafikDua;
use Illuminate\Http\File;
use App\Models\PengajuanKur;
use App\Models\TpakdKalteng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FinancialInformation;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class PubController extends Controller
{
    //
    public function index(){
        // return "udin";
        $createSpreadsheet = new spreadsheet();
        $createSheet = $createSpreadsheet->getActiveSheet();
        $createSheet->setCellValue('A1', 'nama');


        $crateWriter = new Xls($createSpreadsheet);
        $crateWriter->save('udin.xlsx');

        $newss = News::where('status',1)->latest()->get()->take(4);
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
    public function pilih($id){
      
        $data = [
            'title' => 'Home',
            'active'=> 'home',
            'id'    => $id
        
        ];
        return view('pub.pilih',$data);
    }

    public function maps(){
        // return 'usij';
        $banks = Bank::all();
        $maps = "";
        $bank_coordinates = array();
        foreach($banks as $bank){
            // if($maps == ""){
            //     $maps = $maps.'{"type" : "Feature","properties": {"title ": "'.$bank->bank_name.'","description" : "kantor" }, "geometry": {"coordinates" : [113.89518001044064, -2.2192465933650283]}},{"type" : "Feature","properties": {"title ": "Anjing Udin","description" : "kantor" }, "geometry": {"coordinates" : ['.$bank->longitude.', '.$bank->latitude.']}}';
            // }else{
            //     $maps = $maps.',{"type" : "Feature","properties": {"title ": "'.$bank->bank_name.'","description" : "kantor" }, "geometry": {"coordinates" : [113.89518001044064, -2.2192465933650283]}},{"type" : "Feature","properties": {"title ": "Anjing Udin","description" : "kantor" }, "geometry": {"coordinates" : ['.$bank->longitude.', '.$bank->latitude.']}}';
            // }
            $bank_coordinates[] = [
                'type' => 'Feature',
                'properties'=>  [
                    'bank_id'   => $bank->id,
                    'title'=> $bank->bank_name,
                    'description' => $bank->bank_address,
                ],
                'geometry'=> [
                    'coordinates' =>[$bank->longitude, $bank->latitude],
                ]
            ];

        }
        // dd($bank_coordinates);
 
        // $ahmadiString = '['.$maps.']';
        $ahmadies = json_encode($bank_coordinates);
        // dd($ahmadies);
        $data = [
            'title' => 'Maps',
            'active'=> 'maps',
            'test'  => $ahmadies
            

        ];
        return view('pub.maps',$data);
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
        $profile = FinancialInformation::where('financial', 'Latar Belakang')->get()->first();
        $data = [
            'profile'   => $profile,
            'title' => 'Latar Belakang',
            'active'=> 'home'
        ];
        return view('pub.latar_belakang',$data);
    }
    public function dasar_pembentukan(){
        $profile = FinancialInformation::where('financial', 'Dasar Pembentukan')->get()->first();
        $data = [
            'profile'   => $profile,
            'title' => 'Dasar Pembentukan',
            'active'=> 'home'
        ];
        return view('pub.dasar_pembentukan',$data);
    }
    public function roadmap(){
        $profile = FinancialInformation::where('financial', 'Road Map')->get()->first();
        $data = [
            'title' => 'Roadmap',
            'profile'   => $profile,
            'active'=> 'home'
        ];
        return view('pub.roadmap',$data);
    }
    public function tpakd_kalteng(){
        $tpkad_kaltengs = TpakdKalteng::where('status',1)->latest()->get();
        $data = [
            'title' => 'Tpakd Kalteng',
            'tpkad_kaltengs'    =>$tpkad_kaltengs,
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
        $data = News::where('status',1)->latest()->take(40)->get();
        // dd($data);
        $data = [
            'title' => 'Tpakd Berita',
            'data'  => $data,
            'active'=> 'berita'
        ];
        return view('pub.berita',$data);
    }
    public function promosi(){
        $data = Promotion::where('status',1)->latest()->take(40)->get();
        // dd($data);
        $data = [
            'title' => 'Tpakd Berita',
            'data'  => $data,
            'active'=> 'promosi'
        ];
        return view('pub.promosi',$data);
    }
    public function layanan_konsumen(){
        $data = [
            'title' => 'Layanan Konsumen',
            'active'=> 'layanan_konsumen'
        ];
        return view('pub.layanan_konsumen',$data);
    }
    public function informasi_kpmr(){
        $profile = FinancialInformation::where('financial', 'K-PMR')->get()->first();
        $data = [
            'title' => 'Informasi K-PMR',
            'profile'   => $profile,
            'active'=> 'layanan_konsumen'
        ];
        return view('pub.informasi_kpmr',$data);
    }
    public function informasi_kur(){
        $profile = FinancialInformation::where('financial', 'KUR')->get()->first();
        $data = [
            'title' => 'Informasi KUR',
            'profile'   => $profile,
            'active'=> 'informasi-kur'
        ];
        return view('pub.informasi_kur',$data);
    }
    public function informasi_simpel(){
        $profile = FinancialInformation::where('financial', 'SIMPEL')->get()->first();
        $data = [
            'title' => 'Informasi SIMPEL',
            'profile'   => $profile,
            'active'=> 'informasi'
        ];
        return view('pub.informasi_simpel',$data);
    }
    public function informasi_QRIS(){
        $profile = FinancialInformation::where('financial', 'QRIS')->get()->first();
        $data = [
            'title' => 'Informasi KUR',
            'profile'   => $profile,
            'active'=> 'informasi-kur'
        ];
        return view('pub.informasi_qris',$data);
    }
    public function detail_berita($slug){
        $datas = News::where('status',1)->latest()->take(4)->get();
        $data = [
            'title' => 'Berita',
            'active'=> 'berita',
            'newses'    =>$datas,
            'news'  => $news = News::where('slug', $slug)->first()
        ];
        // dd($data);
        return view('pub.detail_berita', $data);
    }
    
    public function pengajuan_kur($id = null){
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
        return view('pub.pengajuan_kur',$data);
    }
    public function pengajuan_rekening($id = null){
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
        return view('pub.pengajuan_rekening',$data);
    }
    public function pengajuan_qris($id = null){
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
        return view('pub.pengajuan_qris',$data);
    }
    public function pengajuan_pinjaman($id = null){
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
        return view('pub.pengajuan_pinjaman',$data);
    }
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
    
   


    public function cariPengajuanSaya($no_pengajuan){
        
        $jenis;

        $no = explode('-',$no_pengajuan);
        
        
       

        $search = DB::table('pengajuans')->where('id', $no[1])
        ->get();


        if($search->isNotEmpty()){
            // dd( $search->first());
            $data = [
                'searched' => $search->first(),
                'data'  => true
            ];
            // dd($data);
            return  redirect('/pengajuan-saya')->with('data', $search->first());
        }else{
            return  redirect('/pengajuan-saya')->with('data', false);
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
