<?php

namespace App\Http\Controllers;

use App\Models\kr;
use App\Models\Bank;
use App\Models\DatI;
use App\Models\DatII;
use App\Models\JobDesk;
use App\Models\BankName;
use App\Models\BankAdmin;
use App\Models\BankOwner;
use App\Models\OfficeStatus;
use Illuminate\Http\Request;
use App\Models\BankOperational;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return session('dataUser');
        $bank;
        if(session('dataUser')->role == "superadmin"){
            $banks = Bank::latest()->get();
        }else if(session('dataUser')->role == "admin-bank"){
            $bank_admin = BankAdmin::where('user_id',session('dataUser')->id )->first();
            $bank = Bank::where('id',$bank_admin->bank_id )->first();
            $banks = Bank::latest()->where('bank_name_id', $bank->bank_name_id)->get();
        }
        // return $banks;
        return view('admin.bank.index', [
            'banks'=>$banks
        ]);
    }

    public function udin(Request $request){
        $udin = $request->dat_i_code;
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $udin], 200);
    }

    public function create()
    {
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
            'job_desks'    => $job_desks,
        ]);
    }
    public function createBank()
    {
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
        // dd($bank_coordinates);
 
        // $ahmadiString = '['.$maps.']';
        // $ahmadi = [
        //     [
        //         'type' => 'Feature',
        //         'properties'=>  [
        //             'title '=> "Anjing Udin",
        //             'description' => 'kantor',
        //         ],
        //         'geometry'=> [
        //             'coordinates' =>[113.89518001044064, -2.2192465933650283],
        //         ]
        //     ],
        //     [
        //         'type' => "Feature",
        //         'properties'=>  [
        //             'title'=> "Anjing Udin",
        //             'description' => 'kantor',
        //         ],
        //         'geometry'=> [
        //             'coordinates' => [113.89518001044064, -2.2192465933650283],
        //         ]
        //     ],
        // ];
        $ahmadies = json_encode($bank_coordinates);
        // dd($ahmadiString);
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
            'id_bank'      => 'required',
        ]);
        $createBank = Bank::create(
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

        return redirect('/add-user/')->with('bank_id',$createBank->id );
    }
   
}
