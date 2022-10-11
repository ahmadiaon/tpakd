<?php

namespace App\Http\Controllers;

use App\Models\BankOwner;
use Illuminate\Http\Request;

class BankOwnerController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'id' => '',
            'bank_owner' => '',
        ]);
             
        $store = BankOwner::updateOrCreate(['id' => $validatedData['id']], $validatedData);
        return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $store], 200);
    }
    public function show($id){
        $data = BankOwner::where('id', $id)->get()->first();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }

    public function delete(Request $request){
        $data = BankOwner::where('id', $request->id)->delete();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
}