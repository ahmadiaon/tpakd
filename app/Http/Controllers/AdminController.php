<?php

namespace App\Http\Controllers;

use App\Models\kr;
use App\Models\Bank;
use App\Models\DatI;
use App\Models\DatII;
use App\Models\JobDesk;
use App\Models\BankName;
use App\Models\BankGroup;
use App\Models\BankOwner;
use App\Models\OfficeStatus;
use Illuminate\Http\Request;
use App\Models\BankOperational;
use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class AdminController extends Controller
{
    public function index(){ 
         

        //  $RET =  session('dataUser');
        //  dd($RET);

         if(session('dataUser')->role_id == 2){
            $bankss = Bank::where('bank_name_id', session('dataUser')->bank_name_id)->get();
            $total_bank = Bank::where('bank_name_id', session('dataUser')->bank_name_id)->count();
            
            $total_ajuan = Pengajuan::join('banks','banks.id','pengajuans.bank_id')
            ->where('bank_name_id', session('dataUser')->bank_name_id)
            ->count();
            $total_ajuan_done = Pengajuan::join('banks','banks.id','pengajuans.bank_id')
            ->where('bank_name_id', session('dataUser')->bank_name_id)
            ->where('status', 'done')->count();
        
        }else{
            $bankss = Bank::all();
            $total_bank = Bank::all()->count();
            $total_admin_bank = Bank::join('bank_admins','bank_admins.bank_id','banks.id')->join('users','users.id','bank_admins.user_id')
            ->where('users.role_id', 2)->get()->count();
            $total_ajuan = Pengajuan::all()->count();
            $total_ajuan_done = Pengajuan::where('status', 'done')->count();
         }
         

         foreach($bankss as $bank){
            $bank->total_kur_done = Pengajuan::where('bank_id', $bank->id)->where('status', 'done')->where('jenis_pengajuan', 'KUR')->count();
            $bank->total_kur_pending = Pengajuan::where('bank_id', $bank->id)->where('status', 'pending')->where('jenis_pengajuan', 'KUR')->count();

            $bank->total_kpmr_done = Pengajuan::where('bank_id', $bank->id)->where('status', 'done')->where('jenis_pengajuan', 'KPMR')->count();
            $bank->total_kpmr_pending = Pengajuan::where('bank_id', $bank->id)->where('status', 'pending')->where('jenis_pengajuan', 'KPMR')->count();

            $bank->total_baru_done = Pengajuan::where('bank_id', $bank->id)->where('status', 'done')->where('jenis_pengajuan', 'BARU')->count();
            $bank->total_baru_pending = Pengajuan::where('bank_id', $bank->id)->where('status', 'pending')->where('jenis_pengajuan', 'BARU')->count();

            $bank->total_pinjaman_done = Pengajuan::where('bank_id', $bank->id)->where('status', 'done')->where('jenis_pengajuan', 'PINJAMAN')->count();
            $bank->total_pinjaman_pending = Pengajuan::where('bank_id', $bank->id)->where('status', 'pending')->where('jenis_pengajuan', 'PINJAMAN')->count();

            $bank->total_simpel_done = Pengajuan::where('bank_id', $bank->id)->where('status', 'done')->where('jenis_pengajuan', 'SIMPEL')->count();
            $bank->total_simpel_pending = Pengajuan::where('bank_id', $bank->id)->where('status', 'pending')->where('jenis_pengajuan', 'SIMPEL')->count();

            $bank->total_qris_done = Pengajuan::where('bank_id', $bank->id)->where('status', 'done')->where('jenis_pengajuan', 'QRIS')->count();
            $bank->total_qris_pending = Pengajuan::where('bank_id', $bank->id)->where('status', 'pending')->where('jenis_pengajuan', 'QRIS')->count();
            
         }
        //  dd($bankss);

        if(session('dataUser')->role_id == 2){
            return view('admin.index', [
                'title'         => 'Index',
                'active' => 'setup',
                'banks' => $bankss,
    
                'total_bank' => $total_bank,
                'total_ajuan' => $total_ajuan,
                'total_ajuan_done' => $total_ajuan_done,
            ]);
        }else{
            return view('admin.index', [
                'title'         => 'Index',
                'active' => 'setup',
                'banks' => $bankss,
    
                'total_bank' => $total_bank,
                'total_admin_bank' => $total_admin_bank,
                'total_ajuan' => $total_ajuan,
                'total_ajuan_done' => $total_ajuan_done,
            ]);
        }

        
    }

    public function setup(){
       
        $office_statuses = OfficeStatus::latest()->simplePaginate(4);
        $bank_operationals = BankOperational::latest()->simplePaginate(4);
        $bank_owners = BankOwner::latest()->simplePaginate(4);
        $dat_i_s = DatI::latest()->simplePaginate(4);
        $dat_i_i_s = DatII::latest()->simplePaginate(4);
        $bank_admins = DB::table('bank_admins')
        ->join('users', 'users.id' ,'=','bank_admins.user_id')
        ->join('banks', 'banks.id' ,'=','bank_admins.bank_id')
        ->get(['users.*', 'bank_admins.*','banks.*']);
        
        return view('admin.setup', [
            'title'         => 'Setup',
            'active' => 'setup',
            'office_statuses'   => $office_statuses,
            'bank_operationals'   => $bank_operationals,
            'bank_owners'   => $bank_owners,
            'dat_i_s'   => $dat_i_s,
            'dat_i_i_s'   => $dat_i_i_s,
            'bank_admins'   => $bank_admins
        ]);
    }

    public function adminBank(){
        session('dataUser')->role;
        $bank;
        if(session('dataUser')->role == "superadmin"){
            $banks =  DB::select(
                'SELECT `banks`.`bank_name_id`, `users`.`name`, `users`.`email`, `bank_names`.`bank_name` 
                FROM `banks`, `bank_admins`, `users`, `bank_names`
                WHERE `banks`.`id` = `bank_admins`.`bank_id`
                AND `banks`.`bank_name_id` = `bank_names`.`id`
                AND `bank_admins`.`user_id` = `users`.`id`
                AND `users`.`role_id` = 2');
            // $banks = Bank::latest()->simplePaginate(4);
        }else if(session('dataUser')->role == "admin-bank"){
            $bank_admin = BankAdmin::where('user_id',session('dataUser')->id )->first();
            $bank = Bank::where('id',$bank_admin->bank_id )->first();
            $banks = Bank::latest()->where('bank_name_id', $bank->bank_name_id)->simplePaginate(4);
        }
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
        AND users.role_id = roles.id
        AND roles.role = "admin-bank"');

        $data = User::join('bank_admins', 'bank_admins.user_id','users.id')
        ->join('banks', 'banks.id', 'bank_admins.bank_id')
        ->join('roles','roles.id','users.role_id')
        ->where('roles.role', 'admin-bank')
        ->get([
            'banks.*',
            'users.name as username',
            'users.email'
        ]);
        // dd($data);
        // return $banks = DB::table('banks')
        // ->join('bank_names', 'bank_names.id', '=', 'banks.bank_name_id')
        // ->join('office_statuses', 'office_statuses.id', '=', 'banks.office_status_id')
        // ->join('bank_operationals', 'bank_operationals.id', '=', 'banks.bank_operational_id')
        // ->join('bank_owners', 'bank_owners.id', '=', 'banks.bank_owner_id')
        // ->join('dat_i_s', 'dat_i_s.id', '=', 'banks.dat_i_id')
        // ->join('dat_i_i_s', 'dat_i_i_s.id', '=', 'banks.dat_i_i_id')
        // ->join('krs', 'krs.id', '=', 'banks.kr_id')
        // ->join('job_desks', 'job_desks.id', '=', 'banks.job_desk_id')
        // ->join('bank_adminss', 'bank_admins.bank_id', '=', 'banks.id')
        // ->get()
        ;
        // return $banks;
        return view('admin.admin_bank.index', [
            'banks'=>$data,
            'active' => 'admin-bank',     
                  
        ]);
    }
    public function createBank(){
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
            'active' => 'admin-bank',   
            'office_statuss'    => $office_status,
            'bank_operationals'    => $bank_operationals,
            'bank_owners'    => $bank_owners,
            'dat_i_s'    => $dat_i_s,
            'dat_i_i_s'    => $dat_i_i_s,
            'krs'    => $krs,
            'job_desks'    => $job_desks,
            'bank_name_id' => session('dataUser')->bank_name_id
        ]);
    }
    
}
