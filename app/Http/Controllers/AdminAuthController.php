<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.auth_admin.login');
    }
    public function cekLogin(Request $request){
        $request->validate([
            'name'      => 'required',
            'password'      => 'required',
        ]);
        $dataUser = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.role_id')
        ->where('users.name', $request->name)
        ->get(['roles.role', 'users.*'])
        ->first();
        if($dataUser){
            if(Hash::check($request->password, $dataUser->password)){
                $request->session()->put('dataUser', $dataUser);

                // dd($dataUser);
                switch($dataUser->role) {
                    case('superadmin'):
                        return redirect()->intended('/superadmin');
                        break;
                    case('admin-bank'):
                         $dataUser = DB::table('users')
                        ->join('roles', 'roles.id', '=', 'users.role_id')
                        ->join('bank_admins', 'bank_admins.user_id', '=', 'users.id')
                        ->where('users.name', $request->name)
                        ->get(['roles.role', 'users.*','bank_admins.bank_id'])
                        ->first();
                        $bankName_id = DB::table('banks')
                        ->join('bank_admins', 'bank_admins.bank_id', '=', 'banks.id')
                        ->where('bank_admins.user_id', $dataUser->id )
                        ->get()->first();
                        if(empty($bankName_id)){
                            return redirect()->route('login');
                        }
                        $dataUser->bank_name_id= $bankName_id->bank_name_id;
                        $request->session()->put('dataUser', $dataUser);
                        
                        return redirect()->intended('/beranda');
                        return redirect()->route('admin-page');
                        break;
                    case('bank'):
                        $dataUser = DB::table('users')
                        ->join('roles', 'roles.id', '=', 'users.role_id')
                        ->join('bank_admins', 'bank_admins.user_id', '=', 'users.id')
                        ->where('users.name', $request->name)
                        ->get(['roles.role', 'users.*','bank_admins.bank_id'])
                        ->first();
                        $bankName_id = DB::table('banks')
                        ->join('bank_admins', 'bank_admins.bank_id', '=', 'banks.id')
                        ->where('bank_admins.user_id', $dataUser->id )
                        ->get()->first();
                        $dataUser->bank_name_id= $bankName_id->bank_name_id;
                        // dd($dataUser);
                        $request->session()->put('dataUser', $dataUser);
                        return redirect()->intended('list-pengajuan/kur');
                        break;
                    
                    default:
                        $msg = 'Something went wrong.';
                }
                return redirect()->intended('/');
            }else{
                return back()->with('loginError', 'Login Failed!');
            }
        }else{
            $request->session()->put('isAdmin','0');
        }
        return redirect()->route('login');
    }

    public function hasLogin(){
        return "hash login";
    }

    public function indexSuperAdmin(){
        return "login as supoeradmin";
    }

    public function indexAdmin(){
        return session('dataUser');
        return "login as admin";
    }

    public function indexBank(){
        return "login as bank";
    }

}