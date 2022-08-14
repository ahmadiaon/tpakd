<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use App\Models\BankAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class BankAdminController extends Controller
{
    public function create(){
        $roles = Role::latest()->get();
        $banks = Bank::latest()->get();
        return view('admin.bank_admin.create',[
            'banks' => $banks,
            'roles' => $roles
            
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'bank_id'      => 'required',
            'name'      => 'required',
            'password'      => 'required',
            'role_id'=> 'required',
            'phone_number'         => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        $admin = BankAdmin::create([
            'user_id' =>  $user->id,
            'bank_id' => $request->bank_id,
            'phone_number' => $request->phone_number
        ]);
        return $admin;
    }
}
