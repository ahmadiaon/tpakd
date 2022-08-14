<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Role;
use App\Models\BankName;
use App\Models\BankGroup;
use Illuminate\Http\Request;


class BankGroupController extends Controller
{
    public function create()
    {
        return view('admin.bank_group.create', [
            'title' =>'title'
        ]);
    }

    public function createBank(){

        $id = session('id'); 
        $roles = Role::latest()->get();
        $banks = BankName::latest()->get();
        return view('admin.bank_admin.create',[
            'bank_names' => $banks,
            'roles' => $roles,
            'id' => $id
            
        ]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'bank_group_name'      => 'required',
            'bank_group_code'      => 'required',
        ]);
        $validated = array();
        if ($request->file('content')) {
            $imageName =  $request->bank_group_code . '.' . $request->content->extension();
            $request->content->move('image/media/', $imageName);
            $validated = [
                'photo_path'=>'image/media/'.$imageName,
                'id' => $request->bang_group_id,
                'bank_group_name'      => $request->bank_group_name,
                'bank_group_code'      => $request->bank_group_code
            ];
        }else{
            $validated[] = [
                'id' => $request->bang_group_id,
                'bank_group_name'      => $request->bank_group_name,
                'bank_group_code'      => $request->bank_group_code
            ];
        }
        $data = BankName::create([
            'bank_name' => $request->bank_group_name
        ]);
        
        return redirect('/bank-name-create/')->with('id',$data->id );
        
    }
}
