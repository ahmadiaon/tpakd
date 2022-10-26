<?php

namespace App\Http\Controllers;

use App\Models\kr;
use App\Models\Bank;
use App\Models\User;
use App\Models\DatI;
use App\Models\DatII;
use App\Models\JobDesk;
use App\Models\BankName;
use App\Models\BankAdmin;

use Illuminate\Support\Facades\Hash;
use App\Models\BankOwner;
use App\Models\OfficeStatus;
use Illuminate\Http\Request;
use App\Models\BankOperational;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index()
    {
        // return session('dataUser');
        $bank;
        if(session('dataUser')->role == "superadmin"){
            $banks = Bank::latest()->get();
            $banks = Bank::join('bank_admins','bank_admins.bank_id', 'banks.id')
            ->join('users','users.id', 'bank_admins.user_id')
            ->latest()->get([
                'banks.*',
                'users.name',
                'bank_admins.user_id'
            ]);
        }else if(session('dataUser')->role == "admin-bank"){
            $bank_admin = BankAdmin::where('user_id',session('dataUser')->id )->first();
            $bank = Bank::where('id',$bank_admin->bank_id )->first();
            $banks = Bank::join('bank_admins','bank_admins.bank_id', 'banks.id')
            ->join('users','users.id', 'bank_admins.user_id')
            ->latest()->where('bank_name_id', $bank->bank_name_id)->get([
                'banks.*',
                'users.name',
                'bank_admins.user_id'
            ]);
        }
        // dd($banks) ;
        return view('admin.bank.index', [
            'banks'=>$banks,
            'active'    => 'bank'
        ]);
    }

    public function create()
    {
        $banks = Bank::all();
        
        // dd($banks);
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
                    'title'=> $bank->bank_name,
                    'description' => $bank->bank_address,
                ],
                'geometry'=> [
                    'coordinates' =>[$bank->longitude, $bank->latitude],
                ]
            ];

        }

        $ahmadies = json_encode($bank_coordinates);
        
        $bank_names = BankName::latest()->get();
        $office_status = OfficeStatus::latest()->get();
        $bank_operationals = BankOperational::latest()->get();
        $bank_owners = BankOwner::latest()->get();
        $dat_i_s = DatI::latest()->get();
        $dat_i_i_s = DatII::latest()->get();
        $krs = kr::latest()->get();
        $job_desks = JobDesk::latest()->get();
        return view('admin.bank.create',[
            'bank_names'    => $bank_names,
            'office_statuss'    => $office_status,
            'bank_operationals'    => $bank_operationals,
            'bank_owners'    => $bank_owners,
            'dat_i_s'    => $dat_i_s,
            'dat_i_i_s'    => $dat_i_i_s,
            'krs'    => $krs,
            'test'  => $ahmadies,
            'job_desks'    => $job_desks,
        ]);
    }
    public function createBank()
    {
        // dd('udin');
        $bank_names = BankName::latest()->get();
        $office_status = OfficeStatus::latest()->get();
        $bank_operationals = BankOperational::latest()->get();
        $bank_owners = BankOwner::latest()->get();
        $dat_i_s = DatI::latest()->get();
        $dat_i_i_s = DatII::latest()->get();
        $krs = kr::latest()->get();

        $dd = [
            'title'=> "Create Bank",
            'description'=> 'kantor '
        ];
       

        $ddd = json_encode($dd);
        $dddd = [
            'coordinates'=>'[113.89518001044064, -2.2192465933650283]'
        ];
        $ddddd = json_encode($dddd);

        $ddd_d = [
                'type'=> 'Feature',
                'properties' => $dd,
                'geometry' => $ddddd,
        ];
        $ddd_dd = json_encode($ddd_d);

        $banks = Bank::all();
        
        // dd($banks);
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
                    'title'=> $bank->bank_name,
                    'description' => $bank->bank_address,
                ],
                'geometry'=> [
                    'coordinates' =>[$bank->longitude, $bank->latitude],
                ]
            ];

        }

        $ahmadies = json_encode($bank_coordinates);
        // dd($ahmadiString);
        $job_desks = JobDesk::latest()->get();
        return view('admin.bank.create',[
            'active'    => 'create-bank',
            'bank_names'    => $bank_names,
            'office_statuss'    => $office_status,
            'bank_operationals'    => $bank_operationals,
            'bank_owners'    => $bank_owners,
            'dat_i_s'    => $dat_i_s,
            'dat_i_i_s'    => $dat_i_i_s,
            'krs'    => $krs,
            'test'  => $ahmadies,
            'job_desks'    => $job_desks,
            'bank_name_id' => (session('dataUser')->role_id == 2) ? session('dataUser')->bank_name_id:0
        ]);
    }

    public function ourBank(){
        $bank;
        if(session('dataUser')->role == "superadmin"){
            $banks = Bank::latest()->simplePaginate(4);
        }else if(session('dataUser')->role == "admin-bank"){
          
            $bank_admin = BankAdmin::where('user_id',session('dataUser')->id )->first();
            $bank = Bank::where('id',$bank_admin->bank_id )->first();
            $banks = Bank::latest()->where('bank_name_id', $bank->bank_name_id)->simplePaginate(4);
           
        }
        // return session('dataUser');
        return view('admin.bank.index', [
            'banks'=>$banks
        ]);
        return "ourBank";
    }

    public function store(Request $request)
    {
        // dd($request);
       
            $request->validate([
                'id_bank'      => '',
            ]);
        
        

        $createBank = Bank::updateOrCreate(['id'=> $request->id],
            [
                'id_bank' => $request->id_bank ,
                'bank_name_id' => $request->bank_name_id ,
                'office_status_id' => $request->office_status_id ,
                'bank_operational_id' => $request->bank_operational_id ,
                'bank_owner_id' => $request->bank_owner_id ,
                'dat_i_id' => $request->dat_i_id ,
                'dat_i_i_id' => $request->dat_i_i_id ,
                'kr_id' => $request->kr_id ,
                'job_desk_id' => $request->job_desk_id ,
                'bank_name' => $request->bank_name ,
                'bank_address' => $request->bank_address ,

                'bank_maps' => $request->bank_maps ,
                'bank_pos_code' => $request->bank_pos_code ,
                'bank_no_phone' => $request->bank_no_phone ,
                'bank_no_permission' => $request->bank_no_permission ,
                'bank_close_permission' => $request->bank_close_permission ,
                'bank_date_permission' => $request->bank_date_permission ,
                'bank_status_permission' => $request->bank_status_permission ,
                'bank_date_operation' => $request->bank_date_operation ,
                'bank_date_change' => $request->bank_date_change ,
                'bank_date_close' => $request->bank_date_close ,
                'bank_no_close' => $request->bank_no_close ,
                'latitude' => $request->latitute ,
                'longitude' => $request->longituted ,
                'bank_status' => 'active' ,

            ]
        );

      
        if($request->isedit){
            
            if(session('dataUser')->role == "admin-bank"){
                return redirect('/admin/our-bank');
            }
            if(session('dataUser')->role == "superadmin"){
                return redirect('/superadmin/admin-bank');
            }
            return redirect('/my-bank');
        }

        return redirect('/add-user/')->with('bank_id',$createBank->id );
    }
    
    public function show(){
        // $role=0;
        // return session('dataUser');
        $banks = Bank::all();
        
        // dd($banks);
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
                    'title'=> $bank->bank_name,
                    'description' => $bank->bank_address,
                ],
                'geometry'=> [
                    'coordinates' =>[$bank->longitude, $bank->latitude],
                ]
            ];

        }

        $ahmadies = json_encode($bank_coordinates);
        $data = Bank::where('id', session('dataUser')->bank_id)->get()->first();
        // return $data;
        // return $dataUser;
        $bank_names = BankName::latest()->get();
        $office_status = OfficeStatus::latest()->get();
        $bank_operationals = BankOperational::latest()->get();
        $bank_owners = BankOwner::latest()->get();
        $dat_i_s = DatI::latest()->get();
        $dat_i_i_s = DatII::latest()->get();
        $krs = kr::latest()->get();
        $job_desks = JobDesk::latest()->get();
        return view('admin.bank.edit',[
            'bank_names'    => $bank_names,
            'office_statuss'    => $office_status,
            'bank_operationals'    => $bank_operationals,
            'bank_owners'    => $bank_owners,
            'dat_i_s'    => $dat_i_s,
            'dat_i_i_s'    => $dat_i_i_s,
            'krs'    => $krs,
            'job_desks'    => $job_desks,
            'title'         => 'My Bank',
            'active'    => 'my-bamk',
            'test'  => $ahmadies,
            'bank'  => $data
        ]);
    
    }
    
    public function showAdmin($id){
        // $role=0;
        // return session('dataUser');
        $banks = Bank::all();
        
        // dd($banks);
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
                    'title'=> $bank->bank_name,
                    'description' => $bank->bank_address,
                ],
                'geometry'=> [
                    'coordinates' =>[$bank->longitude, $bank->latitude],
                ]
            ];

        }

        $ahmadies = json_encode($bank_coordinates);
        $data = Bank::where('id', $id)->get()->first();
        // return $data;
        // return $dataUser;
        $bank_names = BankName::latest()->get();
        $office_status = OfficeStatus::latest()->get();
        $bank_operationals = BankOperational::latest()->get();
        $bank_owners = BankOwner::latest()->get();
        $dat_i_s = DatI::latest()->get();
        $dat_i_i_s = DatII::latest()->get();
        $krs = kr::latest()->get();
        $job_desks = JobDesk::latest()->get();
        return view('admin.bank.edit',[
            'bank_names'    => $bank_names,
            'office_statuss'    => $office_status,
            'bank_operationals'    => $bank_operationals,
            'bank_owners'    => $bank_owners,
            'dat_i_s'    => $dat_i_s,
            'dat_i_i_s'    => $dat_i_i_s,
            'krs'    => $krs,
            'job_desks'    => $job_desks,
            'title'         => 'My Bank',
            'active'    => 'my-bamk',
            'test'  => $ahmadies,
            'bank'  => $data
        ]);
    
    }

    public function delete($id){
        
        $delete = Bank::where('id', $id)->delete();
        return  redirect()->back();
    }

    public function resetPass($id){
        
        $delete = Bank::where('id', $id)->get()->first();
        $data = BankAdmin::where('bank_id', $id)->get()->first();
        User::updateOrCreate(['id' => $data->user_id], ['password'=> Hash::make("password"),]);
        
        return  redirect()->back();
    }
   
}