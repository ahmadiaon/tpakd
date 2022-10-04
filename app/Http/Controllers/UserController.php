<?php

namespace App\Http\Controllers;

use App\Models\kr;
use App\Models\Bank;
use App\Models\DatI;
use App\Models\Role;
use App\Models\User;
use App\Models\DatII;
use App\Models\JobDesk;
use App\Models\BankName;
use App\Models\BankAdmin;
use App\Models\BankGroup;
use App\Models\BankOwner;
use App\Models\OfficeStatus;
use Illuminate\Http\Request;
use App\Models\BankOperational;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\UserController;


class UserController extends Controller
{
    public function index(){ 
        return view('admin.bank_group.create_user', [
            'title'         => 'Index',
            'bank_id'   => session('bank_id')
        ]);
    }

    public function create(){
        
        $roles = Role::where('role','!=','superadmin')->latest()->get();
        // dd(session('dataUser')->role);
        if(session('dataUser')->role == "admin-bank"){
            $role = 3;
        }else if(session('dataUser')->role == "superadmin"){
            $role = 2;
        }
        // return $role;
        return view('admin.bank_group.create_user', [
            'title'         => 'Index',
            'roles'=> $roles,
            'role_id'   =>$role,
            'bank_id'   => session('bank_id')
        ]);
        
    }
    public function storeUser(Request $request){
 
        $validatedData = $request->validate([
            'name'         => 'required|max:255',
            'password'       => 'required',
            'role_id'    => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' =>Hash::make($request->password) ,
            'role_id' => $request->role_id
        ]);

        $bank_admin = BankAdmin::create([
            'bank_id' => $request->bank_id,
            'user_id' => $user->id 
        ]);
        return redirect('/superadmin/admin-bank')->with('success', 'Group Added!');  
    }

    public function adminBank(){
        
    }
    public function createBank(){
      
    }
    
}
